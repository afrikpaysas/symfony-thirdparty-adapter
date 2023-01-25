<?php

/**
 * PHP Version 8.1
 * PaymentProcessService.
 *
 * @category Service
 * @package  Afrikpaysas\Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Service/PaymentProcessService.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Lib\Service;

use Afrikpaysas\Lib\Dto\ProviderPaymentResponse;
use Afrikpaysas\Lib\Entity\Transaction;
use Afrikpaysas\Lib\Exception\GeneralNetworkException;
use Afrikpaysas\Lib\Exception\NetworkException;
use Afrikpaysas\Lib\Exception\PaymentAPIException;

/**
 * PaymentProcessService.
 *
 * @category Service
 * @package  Afrikpaysas\Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Service/PaymentProcessService.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
interface PaymentProcessService
{
    /**
     * Payment.
     *
     * @param Transaction $transaction transaction
     *
     * @return array
     *
     * @throws NetworkException|GeneralNetworkException
     */
    public function payment(Transaction $transaction): array;

    /**
     * GenerateProviderPaymentResponse.
     *
     * @param array|null $paymentResult paymentResult
     *
     * @return ProviderPaymentResponse
     */
    public function generateProviderPaymentResponse(
        ?array $paymentResult
    ): ProviderPaymentResponse;

    /**
     * Decision.
     *
     * @param ProviderPaymentResponse $response response
     *
     * @return void
     *
     * @throws PaymentAPIException
     */
    public function decision(ProviderPaymentResponse $response): void;
}
