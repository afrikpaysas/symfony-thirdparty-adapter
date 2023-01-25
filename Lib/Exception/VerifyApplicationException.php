<?php

/**
 * PHP Version 8.1
 * VerifyApplicationException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/VerifyApplicationException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Exception;

use Lib\Model\AppConstants;
use Lib\Model\SystemExceptionMessage;

/**
 * VerifyApplicationException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/VerifyApplicationException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
class VerifyApplicationException extends VerifyException
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
                    SystemExceptionMessage::VERIFY_API_ERROR[AppConstants::CODE],
                    $_ENV['APP_CODE'],
                    $errorCode
                ),
                AppConstants::MESSAGE => sprintf(
                    SystemExceptionMessage::VERIFY_API_ERROR[AppConstants::MESSAGE],
                    $message
                ),
            ]
        );
    }
}
