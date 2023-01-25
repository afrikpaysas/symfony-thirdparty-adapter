<?php

/**
 * PHP Version 8.1
 * PaymentApplicationException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/PaymentApplicationException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Exception;

use Lib\Model\AppConstants;
use Lib\Model\SystemExceptionMessage;

/**
 * PaymentApplicationException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/PaymentApplicationException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
class PaymentApplicationException extends PaymentException
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
                SystemExceptionMessage::PAYMENT_APPLICATION_ERROR[
                    AppConstants::CODE
                ],
                $_ENV['APP_CODE'],
                $errorCode
            ),
            AppConstants::MESSAGE => sprintf(
                SystemExceptionMessage::PAYMENT_APPLICATION_ERROR[
                    AppConstants::MESSAGE
                ],
                $message
            ),
            ]
        );
    }
}
