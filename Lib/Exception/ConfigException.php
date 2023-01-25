<?php

/**
 * PHP Version 8.1
 * ConfigException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/ConfigException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Exception;

use Lib\Model\AppConstants;
use Lib\Model\SystemExceptionMessage;

/**
 * ConfigException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/ConfigException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
class ConfigException extends GeneralException
{
    /**
     * Constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $exceptionDetail = [
            AppConstants::CODE => SystemExceptionMessage::CONFIG_NOT_AUTHORIZED[
                AppConstants::CODE
            ],
            AppConstants::MESSAGE => SystemExceptionMessage::CONFIG_NOT_AUTHORIZED[
                AppConstants::MESSAGE
            ],
        ];

        parent::__construct($exceptionDetail);
    }
}
