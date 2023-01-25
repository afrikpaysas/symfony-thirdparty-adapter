<?php

/**
 * PHP Version 8.1
 * RequiredOptionAmountException.
 *
 * @category Exception
 * @package  Afrikpaysas\Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Exception/RequiredOptionAmountException.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Lib\Exception;

use Afrikpaysas\Lib\Model\AppConstants;
use Afrikpaysas\Lib\Model\SystemExceptionMessage;

/**
 * RequiredOptionAmountException.
 *
 * @category Exception
 * @package  Afrikpaysas\Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Exception/RequiredOptionAmountException.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
class RequiredOptionAmountException extends OptionException
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
                    SystemExceptionMessage::REQUIRED_OPTION_AMOUNT[
                        AppConstants::CODE
                    ],
                    $_ENV['APP_CODE']
                ),
                AppConstants::MESSAGE =>
                    SystemExceptionMessage::REQUIRED_OPTION_AMOUNT[
                        AppConstants::MESSAGE
                    ],
            ]
        );
    }
}
