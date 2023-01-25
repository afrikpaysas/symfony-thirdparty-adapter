<?php

/**
 * PHP Version 8.1
 * IllegalStatusConfirmException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/IllegalStatusConfirmException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Exception;

use Lib\Model\AppConstants;
use Lib\Model\SystemExceptionMessage;

/**
 * IllegalStatusConfirmException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/IllegalStatusConfirmException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
class IllegalStatusConfirmException extends ConfirmException
{
    /**
     * Constructor
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
                    SystemExceptionMessage::ILLEGAL_STATUS_CONFIRM_EXCEPTION[
                        AppConstants::CODE
                    ],
                    $_ENV['APP_CODE']
                ),
                AppConstants::MESSAGE => sprintf(
                    SystemExceptionMessage::ILLEGAL_STATUS_CONFIRM_EXCEPTION[
                        AppConstants::MESSAGE
                    ],
                    $transactionId,
                    $status
                ),
            ]
        );
    }
}
