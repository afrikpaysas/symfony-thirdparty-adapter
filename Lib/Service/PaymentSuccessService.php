<?php

/**
 * PHP Version 8.1
 * PaymentSuccessService.
 *
 * @category Service
 * @package  Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Service/PaymentSuccessService.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */

namespace Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Service;

use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Dto\ProviderPaymentResponse;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Entity\Transaction;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Exception\PaymentApplicationException;

/**
 * PHP Version 8.1
 * PaymentSuccessService.
 *
 * @category Service
 * @package  Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Service
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
     * @param Transaction             $transactionOp transactionOp
     * @param ProviderPaymentResponse $response      response
     *
     * @return Transaction
     *
     * @throws PaymentApplicationException
     */
    public function success(
        Transaction $transactionOp,
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
