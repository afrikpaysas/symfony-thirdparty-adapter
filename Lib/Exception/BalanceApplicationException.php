<?php

/**
 * PHP Version 8.1
 * BalanceApplicationException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/BalanceApplicationException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Exception;

use Lib\Model\AppConstants;
use Lib\Model\SystemExceptionMessage;

/**
 * BalanceApplicationException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/BalanceApplicationException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
class BalanceApplicationException extends PaymentException
{
    /**
     * Constructor.
     *
     * @param string $errorCode errorCode
     * @param string $message   message
     *
     * @return void
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     */
    public function __construct(string $errorCode, string $message)
    {
        parent::__construct(
            [
                AppConstants::CODE => sprintf(
                    SystemExceptionMessage::BALANCE_APPLICATION_ERROR[
                        AppConstants::CODE
                    ],
                    $_ENV['APP_CODE'],
                    $errorCode
                ),
                AppConstants::MESSAGE => sprintf(
                    SystemExceptionMessage::BALANCE_APPLICATION_ERROR[
                        AppConstants::MESSAGE
                    ],
                    $message
                ),
            ]
        );
    }
}
