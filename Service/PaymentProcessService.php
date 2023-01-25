<?php

/**
 * PHP Version 8.1
 * PaymentProcessService.
 *
 * @category Service
 * @package  Afrikpaysas\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Service/PaymentProcessService.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Service;

use Afrikpaysas\Dto\ProviderPaymentResponse;
use Afrikpaysas\Model\AppConstants as LocalAppConstants;
use Afrikpaysas\Lib\Dto\ProviderPaymentResponse as BaseProviderPaymentResponse;
use Afrikpaysas\Lib\Entity\Transaction as BaseTransaction;
use Afrikpaysas\Lib\Exception\PaymentAPIException;
use Afrikpaysas\Lib\Service\HttpService;
use Afrikpaysas\Lib\Service\PaymentProcessService as BasePaymentProcessService;

/**
 * PHP Version 8.1
 * PaymentProcessService.
 *
 * @category Service
 * @package  Afrikpaysas\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Service/PaymentProcessService.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
class PaymentProcessService implements BasePaymentProcessService
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
     * @param BaseTransaction $transaction transaction
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
    public function payment(BaseTransaction $transaction): array
    {
        $response = null;

        if ($_ENV['API_PAYMENT'] && $_ENV['API_TOKEN']) {
            $response = $this->httpService->sendPOSTWithToken(
                $_ENV['API_PAYMENT'],
                $transaction->toArray(),
                []
            );
        } elseif ($_ENV['API_PAYMENT']) {
            $response = $this->httpService->sendPOST(
                $_ENV['API_PAYMENT'],
                $transaction->toArray()
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
     * @psalm-suppress PossiblyNullArrayAccess
     * @psalm-suppress MixedArrayAccess
     * @psalm-suppress MixedAssignment
     */
    public function generateProviderPaymentResponse(
        ?array $paymentResult
    ): ProviderPaymentResponse {
        $response = new ProviderPaymentResponse();

        $response->providerStatus = $paymentResult[LocalAppConstants::API_CODE];
        $response->providerMessage = $paymentResult[
            LocalAppConstants::API_DATA_MESSAGE
        ];
        if ($paymentResult[LocalAppConstants::API_DATA]) {
            $response->providerId = $paymentResult[
                LocalAppConstants::API_DATA
            ][LocalAppConstants::API_DATA_TRANSACTION_ID];
            $response->txnDataStatus = $paymentResult[
                LocalAppConstants::API_DATA
            ][LocalAppConstants::API_DATA_STATUS];
            $response->txnDataMessage = $paymentResult[
                LocalAppConstants::API_DATA
            ][LocalAppConstants::API_DATA_MESSAGE];
        }

        return $response;
    }

    /**
     * Decision.
     *
     * @param BaseProviderPaymentResponse $response response
     *
     * @return void
     *
     * @throws PaymentAPIException
     */
    public function decision(BaseProviderPaymentResponse $response): void
    {
        $condition = LocalAppConstants::API_SUCCESS_CODE !=
            $response->providerStatus ||
            !$response->providerId;

        if ($condition) {
            throw new PaymentAPIException(
                (int)$response->providerStatus,
                $response->providerMessage ?? ''
            );
        }
    }
}
