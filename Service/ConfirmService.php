<?php

/**
 * PHP Version 8.1
 * ConfirmService.
 *
 * @category Service
 * @package  Afrikpaysas\SymfonyThirdpartyAdapter\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Service/CancelService.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\SymfonyThirdpartyAdapter\Service;

use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Entity\Transaction;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Dto\ConfirmRequest;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Exception\IllegalProviderConfirmException;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Exception\IllegalStatusConfirmException;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Exception\RequiredProviderIdException;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Model\Status;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Service\ConfirmService as BaseConfirmService;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Service\ReferenceService;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Service\TransactionService;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Service\PaymentVerifyService;

/**
 * ConfirmService.
 *
 * @category ConfirmService
 * @package  Afrikpaysas\SymfonyThirdpartyAdapter\ConfirmService
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
