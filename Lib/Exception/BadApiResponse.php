<?php

/**
 * PHP Version 8.1
 * BadApiResponse.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/BadApiResponse.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Exception;

use Lib\Model\AppConstants;
use Lib\Model\SystemExceptionMessage;

/**
 * BadApiResponse.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/BadApiResponse.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
class BadApiResponse extends GeneralException
{
    /**
     * Constructor.
     *
     * @param string      $api     api
     * @param string|null $message message
     *
     * @return void
     */
    public function __construct(string $api, ?string $message = null)
    {
        $messageTxt = $message ?? '';
        $text = sprintf(
            SystemExceptionMessage::BAD_API_RESPONSE[
                AppConstants::MESSAGE
            ],
            $api,
            $messageTxt
        );

        $exceptionDetail = [
            AppConstants::CODE => SystemExceptionMessage::BAD_API_RESPONSE[
                AppConstants::CODE
            ],
            AppConstants::MESSAGE => $text,
        ];

        parent::__construct($exceptionDetail);
    }
}
