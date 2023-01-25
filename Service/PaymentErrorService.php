<?php

/**
 * PHP Version 8.1
 * PaymentErrorService.
 *
 * @category Service
 * @package  App\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Service/PaymentErrorService.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace App\Service;

use Lib\Entity\Transaction as BaseTransaction;
use Lib\Exception\GeneralException;
use Lib\Exception\RegulateException;
use Lib\Model\AppConstants;
use Lib\Model\Status;
use Lib\Model\SystemExceptionMessage;
use Lib\Service\PaymentErrorService as BasePaymentErrorService;
use Lib\Service\TransactionService;

/**
 * PaymentErrorService.
 *
 * @category Service
 * @package  App\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Service/PaymentErrorService.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
class PaymentErrorService implements BasePaymentErrorService
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
     * Error.
     *
     * @param \Throwable      $exception   exception
     * @param BaseTransaction $transaction transaction
     *
     * @return RegulateException
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     *
     * @psalm-suppress PossiblyUndefinedArrayOffset
     */
    public function error(
        \Throwable $exception,
        BaseTransaction $transaction
    ): RegulateException {
        $condition = Status::FAILED != $transaction->status &&
            Status::SUCCESS != $transaction->status;

        if ($condition) {
            $this->transactionService->updateStatus(
                $transaction->id,
                Status::PROGRESS
            );
        }

        $message = $exception->getMessage();
        $code = $exception->getCode();

        if (!($exception instanceof GeneralException)) {
            $code = SystemExceptionMessage::GENERAL_FAILURE[AppConstants::CODE];
            $messageTmp = SystemExceptionMessage::GENERAL_FAILURE[
                AppConstants::MESSAGE
            ];
            $messageTxt = '';
            if (AppConstants::ENV_DEV == $_ENV['APP_ENV']) {
                $messageTxt = ', file :'.
                    $exception->getFile().
                    ', line: '.
                    $exception->getLine().
                    ', message:'.
                    $exception->getMessage();
            }
            $message = sprintf(
                $messageTmp,
                $messageTxt
            );
        }

        $messageError = ','.
            AppConstants::CODE.
            ': '.
            $code.', '.
            AppConstants::MESSAGE.
            ': '.$message;

        return new RegulateException($messageError);
    }
}
