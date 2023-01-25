<?php

/**
 * PHP Version 8.1
 * ConfirmService.
 *
 * @category Service
 * @package  Afrikpaysas\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Service/CancelService.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Service;

use Afrikpaysas\Lib\Entity\Transaction;
use Afrikpaysas\Lib\Dto\ConfirmRequest;
use Afrikpaysas\Lib\Exception\IllegalProviderConfirmException;
use Afrikpaysas\Lib\Exception\IllegalStatusConfirmException;
use Afrikpaysas\Lib\Exception\RequiredProviderIdException;
use Afrikpaysas\Lib\Model\Status;
use Afrikpaysas\Lib\Service\ConfirmService as BaseConfirmService;
use Afrikpaysas\Lib\Service\ReferenceService;
use Afrikpaysas\Lib\Service\TransactionService;
use Afrikpaysas\Lib\Service\PaymentVerifyService;

/**
 * ConfirmService.
 *
 * @category ConfirmService
 * @package  Afrikpaysas\ConfirmService
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Service/ConfirmService.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
class ConfirmService implements BaseConfirmService
{
    protected TransactionService $transactionService;
    protected ReferenceService $referenceService;
    protected PaymentVerifyService $paymentVerifyService;

    /**
     * Constructor.
     *
     * @param TransactionService   $transactionService   transactionService
     * @param ReferenceService     $referenceService     referenceService
     * @param PaymentVerifyService $paymentVerifyService paymentVerifyService
     *
     * @return void
     */
    public function __construct(
        TransactionService $transactionService,
        ReferenceService $referenceService,
        PaymentVerifyService $paymentVerifyService
    ) {
        $this->transactionService = $transactionService;
        $this->referenceService = $referenceService;
        $this->paymentVerifyService = $paymentVerifyService;
    }

    /**
     * Confirm.
     *
     * @param ConfirmRequest $request request
     *
     * @return Transaction
     *
     * @throws IllegalStatusConfirmException|RequiredProviderIdException
     *
     * @psalm-suppress PossiblyNullPropertyFetch
     *
     * @psalm-suppress PossiblyNullArgument
     */
    public function confirm(ConfirmRequest $request): Transaction
    {
        $transaction = $this->transactionService->findOneByTransactionId(
            $request->transactionId
        );

        if ($transaction->providerId) {
            throw new IllegalProviderConfirmException(
                $request->transactionId,
                $transaction->providerId,
            );
        }

        $this->paymentVerifyService->verifyProvider($request->providerId);

        $condition = Status::PENDING != $transaction->status &&
            Status::PROGRESS != $transaction->status;

        if ($condition) {
            throw new IllegalStatusConfirmException(
                $transaction->transactionId,
                $transaction->status->value
            );
        }

        return $this->transactionService->updateProviderIdStatus(
            $transaction->id,
            $request->providerId,
            Status::SUCCESS
        );
    }
}
