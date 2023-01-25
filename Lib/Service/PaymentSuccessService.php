<?php

/**
 * PHP Version 8.1
 * PaymentSuccessService.
 *
 * @category Service
 * @package  Afrikpaysas\Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Service/PaymentSuccessService.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Lib\Service;

use Afrikpaysas\Lib\Dto\ProviderPaymentResponse;
use Afrikpaysas\Lib\Entity\Transaction;
use Afrikpaysas\Lib\Exception\PaymentApplicationException;

/**
 * PHP Version 8.1
 * PaymentSuccessService.
 *
 * @category Service
 * @package  Afrikpaysas\Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Service/PaymentSuccessService.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
interface PaymentSuccessService
{
    /**
     * Success.
     *
     * @param Transaction             $transaction transaction
     * @param ProviderPaymentResponse $response    response
     *
     * @return Transaction
     *
     * @throws PaymentApplicationException
     */
    public function success(
        Transaction $transaction,
        ProviderPaymentResponse $response
    ): Transaction;

    /**
     * VerifyAfterPayment.
     *
     * @param Transaction             $transaction transaction
     * @param ProviderPaymentResponse $response    response
     *
     * @return void
     */
    public function verifyAfterPayment(
        Transaction $transaction,
        ProviderPaymentResponse $response
    ): void;

    /**
     * SetBalance.
     *
     * @param Transaction $transaction transaction
     *
     * @return void
     */
    public function setBalance(Transaction $transaction): void;
}
