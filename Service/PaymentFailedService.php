<?php

/**
 * PHP Version 8.1
 * PaymentFailedService.
 *
 * @category Service
 * @package  Afrikpaysas\SymfonyThirdpartyAdapter\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Service/PaymentFailedService.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */

namespace Afrikpaysas\SymfonyThirdpartyAdapter\Service;

use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Entity\Transaction;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Exception\PaymentAPIException;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Model\Status;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Service\PaymentFailedService as PayFS;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Service\TransactionService;

/**
 * PaymentFailedService.
 *
 * @category Service
 * @package  Afrikpaysas\SymfonyThirdpartyAdapter\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Service/PaymentFailedService.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
class PaymentFailedService implements PayFS
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
     * @param Transaction $transaction transaction
     *
     * @return Transaction
     */
    public function failed(Transaction $transaction): Transaction {
        $transactionOp = $transaction;

        $condition = Status::PROGRESS == $transactionOp->status ||
            Status::PENDING == $transactionOp->status;

        if ($condition) {
            $transactionOp = $this->transactionService->updateStatus(
                $transactionOp->id,
                Status::FAILED
            );
        }

        return $transactionOp;
    }
}
