<?php

/**
 * PHP Version 8.1
 * DataBaseFailureVerifyException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/DataBaseFailureVerifyException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Exception;

use Lib\Model\AppConstants;
use Lib\Model\SystemExceptionMessage;

/**
 * DataBaseFailureVerifyException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/DataBaseFailureVerifyException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
class DataBaseFailureVerifyException extends VerifyException
{
    /**
     * Constructor.
     *
     * @return void
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     */
    public function __construct()
    {
        parent::__construct(
            [
                AppConstants::CODE => sprintf(
                    SystemExceptionMessage::VERIFY_DATABASE_FAILURE[
                        AppConstants::CODE
                    ],
                    $_ENV['APP_CODE']
                ),
                AppConstants::MESSAGE =>
                    SystemExceptionMessage::VERIFY_DATABASE_FAILURE[
                        AppConstants::MESSAGE
                    ],
            ]
        );
    }
}
