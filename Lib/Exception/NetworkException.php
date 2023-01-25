<?php

/**
 * PHP Version 8.1
 * NetworkException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/NetworkException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Exception;

use Lib\Model\AppConstants;
use Lib\Model\SystemExceptionMessage;

/**
 * NetworkException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/NetworkException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
class NetworkException extends GeneralException
{
    /**
     * Constructor.
     *
     * @param string      $api     api
     * @param string|null $message message
     * @param string|null $code    code
     *
     * @return void
     */
    public function __construct(
        string $api,
        string $message = null,
        string $code = null
    ) {
        $text = sprintf(
            SystemExceptionMessage::NETWORK_FAILURE[AppConstants::MESSAGE],
            $api
        );

        $exceptionDetail = [
            AppConstants::CODE => SystemExceptionMessage::NETWORK_FAILURE[
                AppConstants::CODE
            ],
            AppConstants::MESSAGE => $text,
        ];

        parent::__construct($exceptionDetail, $message, (int)$code);
    }
}
