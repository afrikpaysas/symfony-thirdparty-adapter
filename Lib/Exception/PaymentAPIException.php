<?php

/**
 * PHP Version 8.1
 * PaymentAPIException.
 *
 * @category Exception
 * @package  Afrikpaysas\Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Exception/PaymentAPIException.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Lib\Exception;

use Afrikpaysas\Lib\Model\AppConstants;
use Afrikpaysas\Lib\Model\SystemExceptionMessage;

/**
 * PaymentAPIException.
 *
 * @category Exception
 * @package  Afrikpaysas\Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Exception/PaymentAPIException.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
class PaymentAPIException extends PaymentException
{
    /**
     * Constructor.
     *
     * @param int    $errorCode errorCode
     * @param string $message   message
     *
     * @return void
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     */
    public function __construct(int $errorCode, string $message)
    {
        parent::__construct(
            [
                AppConstants::CODE => sprintf(
                    SystemExceptionMessage::PAYMENT_API_EXCEPTION[
                        AppConstants::CODE
                    ],
                    $_ENV['APP_CODE'],
                    $errorCode
                ),
                AppConstants::MESSAGE => sprintf(
                    SystemExceptionMessage::PAYMENT_API_EXCEPTION[
                        AppConstants::MESSAGE
                    ],
                    $message
                ),
            ]
        );
    }
}
