<?php

/**
 * PHP Version 8.1
 * InvalidAmountOptionException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/InvalidAmountOptionException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Exception;

use Lib\Model\AppConstants;
use Lib\Model\SystemExceptionMessage;

/**
 * InvalidAmountOptionException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/InvalidAmountOptionException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
class InvalidAmountOptionException extends VerifyException
{
    /**
     * Constructor.
     *
     * @param string $option option
     * @param float  $amount amount
     *
     * @return void
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     */
    public function __construct(string $option, float $amount)
    {
        parent::__construct(
            [
                AppConstants::CODE => sprintf(
                    SystemExceptionMessage::VERIFY_INVALID_OPTION_AMOUNT_VALUE[
                        AppConstants::CODE
                    ],
                    $_ENV['APP_CODE']
                ),
                AppConstants::MESSAGE => sprintf(
                    SystemExceptionMessage::VERIFY_INVALID_OPTION_AMOUNT_VALUE[
                        AppConstants::MESSAGE
                    ],
                    $option,
                    $amount
                ),
            ]
        );
    }
}
