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

use Afrikpaysas\SymfonyThirdpartyAdapter\Dto\ProviderPaymentResponse;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Exception\GeneralNetworkException;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Exception\LogicNotImplementedException;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Dto\ProviderPaymentResponse as PrPayRp;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Entity\Transaction;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Exception\NetworkException;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Exception\PaymentAPIException;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Service\HttpService;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Service\PaymentProcessService as PyProS;

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

    /**
     * Constructor.
     *
     * @param HttpService $httpService httpService
     *
     * @return void
     */
    public function __construct(HttpService $httpService)
    {
        $this->httpService = $httpService;
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
     * GenerateProviderPaymentResponse.
     *
     * @param array|null $paymentResult paymentResult
     *
     * @return ProviderPaymentResponse
     *
     * @throws LogicNotImplementedException
     *
     * @psalm-suppress PossiblyNullArrayAccess
     * @psalm-suppress MixedArrayAccess
     * @psalm-suppress MixedAssignment
     */
    public function generateProviderPaymentResponse(
        ?array $paymentResult
    ): ProviderPaymentResponse {
        throw new LogicNotImplementedException(__FUNCTION__);
    }

    /**
     * Decision.
     *
     * @param PrPayRp $response response
     *
     * @return void
     *
     * @throws PaymentAPIException|LogicNotImplementedException
     */
    public function decision(PrPayRp $response): void
    {
        throw new LogicNotImplementedException(__FUNCTION__);
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
}
