<?php

/**
 * PHP Version 8.1
 * PaymentErrorService.
 *
 * @category Service
 * @package  Afrikpaysas\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Service/PaymentErrorService.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Service;

use Afrikpaysas\Lib\Entity\Transaction as BaseTransaction;
use Afrikpaysas\Lib\Exception\GeneralException;
use Afrikpaysas\Lib\Exception\RegulateException;
use Afrikpaysas\Lib\Model\AppConstants;
use Afrikpaysas\Lib\Model\Status;
use Afrikpaysas\Lib\Model\SystemExceptionMessage;
use Afrikpaysas\Lib\Service\PaymentErrorService as BasePaymentErrorService;
use Afrikpaysas\Lib\Service\TransactionService;

/**
 * PaymentErrorService.
 *
 * @category Service
 * @package  Afrikpaysas\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Service/PaymentErrorService.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
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
