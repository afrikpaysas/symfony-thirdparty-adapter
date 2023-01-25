<?php

/**
 * PHP Version 8.1
 * PaymentSuccessService.
 *
 * @category Service
 * @package  Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Service/PaymentSuccessService.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Service;

use Lib\Dto\ProviderPaymentResponse;
use Lib\Entity\Transaction;
use Lib\Exception\PaymentApplicationException;

/**
 * PHP Version 8.1
 * PaymentSuccessService.
 *
 * @category Service
 * @package  Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Service/PaymentSuccessService.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
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
