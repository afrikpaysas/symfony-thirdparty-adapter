<?php

/**
 * PHP Version 8.1
 * BadPhoneException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/BadPhoneException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Exception;

use Lib\Model\AppConstants;
use Lib\Model\SystemExceptionMessage;

/**
 * BadPhoneException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/BadPhoneException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
class BadPhoneException extends VerifyException
{
    /**
     * Constructor.
     *
     * @param string $phone phone
     *
     * @return void
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     */
    public function __construct(?string $phone = null)
    {
        $phoneTxt = $phone ?? '';
        parent::__construct(
            [
                AppConstants::CODE => sprintf(
                    SystemExceptionMessage::VERIFY_BAD_PHONE_FORMAT[
                        AppConstants::CODE
                    ],
                    $_ENV['APP_CODE']
                ),
                AppConstants::MESSAGE => sprintf(
                    SystemExceptionMessage::VERIFY_BAD_PHONE_FORMAT[
                        AppConstants::MESSAGE
                    ],
                    $phoneTxt,
                    $_ENV['PHONE_REGEX']
                ),
            ]
        );
    }
}
