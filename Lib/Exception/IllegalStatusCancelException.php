<?php

/**
 * PHP Version 8.1
 * IllegalStatusCancelException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/IllegalStatusCancelException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Exception;

use Lib\Model\AppConstants;
use Lib\Model\SystemExceptionMessage;

/**
 * IllegalStatusCancelException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/IllegalStatusCancelException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
class IllegalStatusCancelException extends ConfirmException
{
    /**
     * Constructor.
     *
     * @param int    $transactionId transactionId
     * @param string $status        status
     *
     * @return void
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     */
    public function __construct(int $transactionId, string $status)
    {
        parent::__construct(
            [
                AppConstants::CODE => sprintf(
                    SystemExceptionMessage::ILLEGAL_STATUS_CANCEL_EXCEPTION[
                        AppConstants::CODE
                    ],
                    $_ENV['APP_CODE']
                ),
                AppConstants::MESSAGE => sprintf(
                    SystemExceptionMessage::ILLEGAL_STATUS_CANCEL_EXCEPTION[
                        AppConstants::MESSAGE
                    ],
                    $transactionId,
                    $status
                ),
            ]
        );
    }
}
