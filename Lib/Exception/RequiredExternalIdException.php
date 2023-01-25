<?php

/**
 * PHP Version 8.1
 * RequiredExternalIdException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/RequiredExternalIdException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Exception;

use Lib\Model\AppConstants;
use Lib\Model\SystemExceptionMessage;

/**
 * RequiredExternalIdException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/RequiredExternalIdException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
class RequiredExternalIdException extends PaymentException
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
                    SystemExceptionMessage::PAYMENT_REQUIRED_EXTERNAL_ID[
                        AppConstants::CODE
                    ],
                    $_ENV['APP_CODE']
                ),
                AppConstants::MESSAGE =>
                    SystemExceptionMessage::PAYMENT_REQUIRED_EXTERNAL_ID[
                        AppConstants::MESSAGE
                    ],
            ]
        );
    }
}
