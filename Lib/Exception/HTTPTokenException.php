<?php

/**
 * PHP Version 8.1
 * HTTPTokenException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/HTTPTokenException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Exception;

use Lib\Model\AppConstants;
use Lib\Model\SystemExceptionMessage;

/**
 * HTTPTokenException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/HTTPTokenException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
class HTTPTokenException extends GeneralException
{
    /**
     * Constructor.
     *
     * @param string      $api     api
     * @param string|null $message message
     * @param int|null    $code    code
     *
     * @return void
     */
    public function __construct(
        string $api,
        string $message = null,
        int $code = null
    ) {
        $text = sprintf(
            SystemExceptionMessage::HTTP_TOKEN_FAILURE[
                AppConstants::MESSAGE
            ],
            $api
        );

        $exceptionDetail = [
            AppConstants::CODE => SystemExceptionMessage::HTTP_TOKEN_FAILURE[
                AppConstants::CODE
            ],
            AppConstants::MESSAGE => $text,
        ];

        parent::__construct($exceptionDetail, $message, $code);
    }
}
