<?php

/**
 * PHP Version 8.1
 * DuplicateTransactionIdException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/DuplicateTransactionIdException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Exception;

use Lib\Model\AppConstants;
use Lib\Model\SystemExceptionMessage;

/**
 * DuplicateTransactionIdException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/DuplicateTransactionIdException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
class DuplicateTransactionIdException extends PaymentException
{
    /**
     * DuplicateTransactionIdException constructor.
     *
     * @param string|null $transactionId transactionId
     *
     * @return void
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     */
    public function __construct(string $transactionId = null)
    {
        parent::__construct(
            [
                AppConstants::CODE => sprintf(
                    SystemExceptionMessage::PAYMENT_DUPLICATE_TRANSACTION_ID[
                        AppConstants::CODE
                    ],
                    $_ENV['APP_CODE']
                ),
                AppConstants::MESSAGE => sprintf(
                    SystemExceptionMessage::PAYMENT_DUPLICATE_TRANSACTION_ID[
                        AppConstants::MESSAGE
                    ],
                    $transactionId ?? ''
                ),
            ]
        );
    }
}
