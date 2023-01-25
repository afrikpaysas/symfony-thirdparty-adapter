<?php

/**
 * PHP Version 8.1
 * InvalidAmountException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/InvalidAmountException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Exception;

use Lib\Model\AppConstants;
use Lib\Model\SystemExceptionMessage;

/**
 * InvalidAmountException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/InvalidAmountException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
class InvalidAmountException extends VerifyException
{
    /**
     * Constructor.
     *
     * @param float|null $amount amount
     *
     * @return void
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     */
    public function __construct(?float $amount = null)
    {
        $amountDefault = $amount ?? '';
        parent::__construct(
            [
                AppConstants::CODE => sprintf(
                    SystemExceptionMessage::VERIFY_INVALID_AMOUNT_RANGE[
                        AppConstants::CODE
                    ],
                    $_ENV['APP_CODE']
                ),
                AppConstants::MESSAGE => sprintf(
                    SystemExceptionMessage::VERIFY_INVALID_AMOUNT_RANGE[
                        AppConstants::MESSAGE
                    ],
                    $amountDefault,
                    $_ENV['AMOUNT_MIN'],
                    $_ENV['AMOUNT_MAX']
                ),
            ]
        );
    }
}
