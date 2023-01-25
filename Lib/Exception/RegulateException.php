<?php

/**
 * PHP Version 8.1
 * RegulateException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/RegulateException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Exception;

use Lib\Model\AppConstants;
use Lib\Model\SystemExceptionMessage;

/**
 * RegulateException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/RegulateException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
class RegulateException extends PaymentException
{
    /**
     * Constructor.
     *
     * @param string $message message
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     */
    public function __construct(string $message)
    {
        parent::__construct(
            [
                AppConstants::CODE => sprintf(
                    SystemExceptionMessage::REGULATE_FAILURE[
                        AppConstants::CODE
                    ],
                    $_ENV['APP_CODE']
                ),
                AppConstants::MESSAGE => sprintf(
                    SystemExceptionMessage::REGULATE_FAILURE[
                        AppConstants::MESSAGE
                    ],
                    $message
                ),
            ]
        );
    }
}
