<?php

/**
 * PHP Version 8.1
 * FailedApiResponse.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/FailedApiResponse.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Exception;

use Lib\Model\AppConstants;
use Lib\Model\SystemExceptionMessage;

/**
 * FailedApiResponse.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/FailedApiResponse.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
class FailedApiResponse extends GeneralException
{
    /**
     * Constructor.
     *
     * @param string $api     api
     * @param string $message message
     * @param string $code    code
     *
     * @return void
     */
    public function __construct(
        string $api,
        string $message = null,
        string $code = null
    ) {
        $messageTxt = $message ?? '';

        $text = sprintf(
            SystemExceptionMessage::BAD_API_RESPONSE[AppConstants::MESSAGE],
            $api,
            $messageTxt
        );

        $exceptionDetail = [
            AppConstants::CODE => SystemExceptionMessage::BAD_API_RESPONSE[
                AppConstants::CODE
            ],
            AppConstants::MESSAGE => $text,
        ];

        parent::__construct($exceptionDetail, $message, (int) $code);
    }
}
