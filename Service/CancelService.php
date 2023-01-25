<?php
/**
 * PHP Version 8.1
 * CancelService.
 *
 * @category Service
 * @package  App\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Service/CancelService.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace App\Service;

use Lib\Entity\Transaction;
use Lib\Exception\IllegalStatusCancelException;
use Lib\Model\Status;
use Lib\Service\CancelService as BaseCancelService;
use Lib\Service\ReferenceService;
use Lib\Service\TransactionService;

/**
 * CancelService.
 *
 * @category Service
 * @package  App\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Service/CancelService.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
class CancelService implements BaseCancelService
{
    protected TransactionService $transactionService;
    protected ReferenceService $referenceService;

    /**
     * Constructor.
     *
     * @param TransactionService $transactionService transactionService
     * @param ReferenceService   $referenceService   referenceService
     *
     * @return void
     */
    public function __construct(
        TransactionService $transactionService,
        ReferenceService $referenceService
    ) {
        $this->transactionService = $transactionService;
        $this->referenceService = $referenceService;
    }

    /**
     * Cancel.
     *
     * @param int $transactionId transactionId
     *
     * @return Transaction
     *
     * @throws IllegalStatusCancelException
     *
     * @psalm-suppress PossiblyNullArgument
     * @psalm-suppress PossiblyNullPropertyFetch
     */
    public function cancel(int $transactionId): Transaction
    {
        $transaction = $this->transactionService->findOneByTransactionId(
            $transactionId
        );

        $condition = Status::PENDING != $transaction->status &&
            Status::PROGRESS != $transaction->status;

        if ($condition) {
            throw new IllegalStatusCancelException(
                $transaction->transactionId,
                $transaction->status->value
            );
        }

        return $this->transactionService->updateStatus(
            $transaction->id,
            Status::CANCELED
        );
    }
}
