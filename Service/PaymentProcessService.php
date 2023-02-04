<?php

/**
 * PHP Version 8.1
 * PaymentProcessService.
 *
 * @category Service
 * @package  Afrikpaysas\SymfonyThirdpartyAdapter\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Service/PaymentProcessService.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */

namespace Afrikpaysas\SymfonyThirdpartyAdapter\Service;

use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Exception\BadProviderResponseException;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Exception\EntityNotFoundException;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Exception\GeneralNetworkException;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Exception\LogicNotImplementedException;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Entity\Transaction;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Exception\NetworkException;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Exception\PaymentAPIException;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Exception\RequiredProviderIdException;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Model\ProviderResponse;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Service\ApiProcessService;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Service\HttpService;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Service\PaymentProcessService as PyProS;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Model\AppConstants;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Service\TransactionService;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Service\PaymentSuccessService;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Service\NotificationService;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Service\CallbackNotificationService;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Service\PaymentFailedService;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Service\PaymentErrorService;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Dto\ProviderPaymentResponse;

/**
 * PHP Version 8.1
 * PaymentProcessService.
 *
 * @category Service
 * @package  Afrikpaysas\SymfonyThirdpartyAdapter\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Service/PaymentProcessService.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
class PaymentProcessService implements PyProS
{
    protected HttpService $httpService;
    protected TransactionService $transactionService;
    protected PaymentSuccessService $paySucService;
    protected NotificationService $notificationService;
    protected CallbackNotificationService $callbackNotificationService;
    protected PaymentFailedService $paymentFailedService;
    protected PaymentErrorService $paymentErrorService;

    /**
     * Constructor.
     *
     * @param HttpService                 $httpService                 httpService
     * @param TransactionService          $transactionService          transactionService
     * @param PaymentSuccessService       $paySucService               paySucService
     * @param NotificationService         $notificationService         notificationService
     * @param CallbackNotificationService $callbackNotificationService callbackNotificationService
     * @param PaymentFailedService        $paymentFailedService        paymentFailedService
     * @param PaymentErrorService         $paymentErrorService         paymentErrorService
     *
     * @return void
     */
    public function __construct(
        HttpService $httpService,
        TransactionService $transactionService,
        PaymentSuccessService $paySucService,
        NotificationService $notificationService,
        CallbackNotificationService $callbackNotificationService,
        PaymentFailedService $paymentFailedService,
        PaymentErrorService $paymentErrorService
    ) {
        $this->httpService = $httpService;
        $this->transactionService = $transactionService;
        $this->paySucService = $paySucService;
        $this->notificationService = $notificationService;
        $this->callbackNotificationService = $callbackNotificationService;
        $this->paymentFailedService = $paymentFailedService;
        $this->paymentErrorService = $paymentErrorService;
    }

    /**
     * Payment.
     *
     * @param Transaction $transaction transaction
     *
     * @return array
     *
     * @throws \Exception
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     *
     * @psalm-suppress InvalidNullableReturnType
     * @psalm-suppress NullableReturnStatement
     * @psalm-suppress MixedArgument
     */
    public function payment(Transaction $transaction): array
    {
        $bodyRequest = $this->bodyRequest($transaction);
        $headersRequest = $this->headersRequest($transaction);
        $tokenRequest = null;
        if ($_ENV['API_TOKEN']) {
            $tokenRequest = $this->tokenRequest($transaction);
        }

        $response = null;

        if ($_ENV['API_PAYMENT']) {
            $response = $this->httpService->sendPOSTWithTokenSet(
                $_ENV['API_PAYMENT'],
                $bodyRequest,
                $headersRequest,
                $tokenRequest
            );
        }

        return $response;
    }


    /**
     * Process.
     *
     * @param ApiProcessService $apiProcessService apiProcessService
     * @param array|null        $apiResponse       apiResponse
     * @param Transaction|null  $transaction       transaction
     * @param bool              $endProcess        endProcess
     *
     * @return Transaction
     *
     * @throws PaymentAPIException
     */
    public function process(
        ApiProcessService $apiProcessService,
        ?array $apiResponse,
        ?Transaction $transaction = null,
        bool $endProcess = true
    ): Transaction {
        $transactionOp = $transaction;

        $status = false;

        try {
            $providerResponse = $apiProcessService->generateProviderResponse($apiResponse);

            if (!$transactionOp) {
                if (!$providerResponse->providerId) {
                    throw new RequiredProviderIdException();
                }
                $transactionOp = $this->transactionService->findOneByProviderId($providerResponse->providerId);
            }

            $transactionOp = $this->processRequest($apiProcessService, $providerResponse, $transactionOp, $endProcess);
            $status = true;
        } catch (RequiredProviderIdException|EntityNotFoundException $exception) {
            throw $exception;
        } catch (PaymentAPIException $exception) {
        } catch (\Throwable $exception) {
            throw $this->paymentErrorService->error($exception, $transactionOp);
        }

        if($status && $endProcess) {
            $this->callbackNotificationService->callbackNotification($transactionOp);
        } elseif(!$status) {
            $transactionOp = $this->paymentFailedService->failed($transactionOp);
            $this->callbackNotificationService->callbackNotification($transactionOp);
        }

        return $transactionOp;
    }

    /**
     * TokenRequest.
     *
     * @param Transaction $transaction transaction
     *
     * @return string|null
     *
     * @throws \Exception|NetworkException|GeneralNetworkException
     */
    public function tokenRequest(Transaction $transaction): string|null
    {
        return $this->httpService->getToken([]);
    }

    /**
     * HeadersRequest.
     *
     * @param Transaction $transaction transaction
     *
     * @return array|null
     */
    public function headersRequest(Transaction $transaction): ?array
    {
        return [];
    }

    /**
     * BodyRequest.
     *
     * @param Transaction $transaction transaction
     *
     * @return array|null
     */
    public function bodyRequest(Transaction $transaction): ?array
    {
        return $transaction->toArray();
    }

    /**
     * ProcessRequest.
     *
     * @param ApiProcessService       $apiProcessService apiProcessService
     * @param Transaction             $transactionOp     transactionOp
     * @param ProviderPaymentResponse $providerResponse  providerResponse
     * @param bool                    $endProcess        endProcess
     *
     * @return Transaction
     *
     * @throws PaymentAPIException
     */
    protected function processRequest(
        ApiProcessService $apiProcessService,
        ProviderPaymentResponse $providerResponse,
        Transaction $transactionOp,
        bool $endProcess = true
    ): Transaction {
        $apiProcessService->decision($providerResponse);

        if (!$endProcess) {
            if (!$providerResponse->providerId) {
                throw new BadProviderResponseException();
            }
            $transactionOp = $this->transactionService->updateProviderId(
                $transactionOp->id,
                $providerResponse->providerId
            );
        } else {
            $transactionOp = $this->paySucService->success($transactionOp, $providerResponse);
            $this->notificationService->notification($transactionOp);
        }

        return $transactionOp;
    }
}
