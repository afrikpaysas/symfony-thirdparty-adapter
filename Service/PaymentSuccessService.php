<?php

/**
 * PHP Version 8.1
 * PaymentSuccessService.
 *
 * @category Service
 * @package  App\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Service/PaymentSuccessService.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace App\Service;

use Lib\Dto\ProviderPaymentResponse as BaseProviderPaymentResponse;
use Lib\Entity\Transaction;
use Lib\Exception\PaymentApplicationException;
use Lib\Model\AppConstants;
use Lib\Model\ApplicationExceptionMessage;
use Lib\Model\Status;
use Lib\Service\PaymentSuccessService as BasePaymentSuccessService;
use Lib\Service\ReferenceService;
use Lib\Service\TransactionService;

/**
 * PaymentSuccessService.
 *
 * @category Service
 * @package  App\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Service/PaymentSuccessService.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
class PaymentSuccessService implements BasePaymentSuccessService
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
     * Success.
     *
     * @param Transaction                 $transaction transaction
     * @param BaseProviderPaymentResponse $response    response
     *
     * @return Transaction
     *
     * @throws \Exception
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     *
     * @psalm-suppress MixedAssignment
     */
    public function success(
        Transaction $transaction,
        BaseProviderPaymentResponse $response
    ): Transaction {
        $condition = Status::PROGRESS != $transaction->status &&
            Status::PENDING != $transaction->status;

        if ($condition) {
            throw new PaymentApplicationException(
                ApplicationExceptionMessage::ILLEGAL_TRANSACTION_STATUS[
                    AppConstants::CODE
                ],
                sprintf(
                    ApplicationExceptionMessage::ILLEGAL_TRANSACTION_STATUS[
                        AppConstants::MESSAGE
                    ],
                    $transaction->status->value
                )
            );
        }

        $this->verifyAfterPayment($transaction, $response);

        $transaction->status = Status::SUCCESS;

        if (AppConstants::PARAMETER_TRUE_VALUE == $_ENV['MANUAL_MODE']) {
            $transaction->status = Status::PROGRESS;
        }

        foreach (get_object_vars($response) as $key => $value) {
            if (property_exists($transaction, $key) && null != $value) {
                $transaction->$key = $value;
            }
        }

        $transaction = $this->transactionService->updateProviderData(
            $transaction->id,
            $transaction
        );

        $condition = AppConstants::PARAMETER_TRUE_VALUE ==
            $_ENV['SET_BALANCE_AFTER_PAYMENT'];

        if ($condition) {
            $this->setBalance($transaction);
        }

        if ($_ENV['REFERENCE_API_ENABLED']) {
            $this->referenceService->updateStatus(
                $transaction->reference,
                Status::SUCCESS
            );
        }

        return $transaction;
    }

    /**
     * VerifyAfterPayment.
     *
     * @param Transaction                 $transaction transaction
     * @param BaseProviderPaymentResponse $response    response
     *
     * @return void
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function verifyAfterPayment(
        Transaction $transaction,
        BaseProviderPaymentResponse $response
    ): void {
        return;
    }

    /**
     * SetBalance.
     *
     * @param Transaction $transaction transaction
     *
     * @return void
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function setBalance(Transaction $transaction): void
    {
        return;
    }
}
