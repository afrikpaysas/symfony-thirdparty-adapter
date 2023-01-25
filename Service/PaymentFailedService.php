<?php

/**
 * PHP Version 8.1
 * PaymentFailedService.
 *
 * @category Service
 * @package  App\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Service/PaymentFailedService.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace App\Service;

use Lib\Entity\Transaction as BaseTransaction;
use Lib\Exception\PaymentAPIException;
use Lib\Model\Status;
use Lib\Service\PaymentFailedService as BasePaymentFailedService;
use Lib\Service\TransactionService;

/**
 * PaymentFailedService.
 *
 * @category Service
 * @package  App\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Service/PaymentFailedService.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
class PaymentFailedService implements BasePaymentFailedService
{
    protected TransactionService $transactionService;

    /**
     * Constructor.
     *
     * @param TransactionService $transactionService transactionService
     *
     * @return void
     */
    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    /**
     * Failed.
     *
     * @param PaymentAPIException $exception   exception
     * @param BaseTransaction     $transaction transaction
     *
     * @return PaymentAPIException
     */
    public function failed(
        PaymentAPIException $exception,
        BaseTransaction $transaction
    ): PaymentAPIException {
        $condition = Status::PROGRESS == $transaction->status ||
            Status::PENDING == $transaction->status;

        if ($condition) {
            $this->transactionService->updateStatus(
                $transaction->id,
                Status::FAILED
            );
        }

        return $exception;
    }
}
