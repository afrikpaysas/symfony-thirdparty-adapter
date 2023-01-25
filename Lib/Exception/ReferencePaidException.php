<?php

/**
 * PHP Version 8.1
 * ReferencePaidException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/ReferencePaidException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Exception;

use Lib\Model\AppConstants;
use Lib\Model\SystemExceptionMessage;

/**
 * ReferencePaidException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/ReferencePaidException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
class ReferencePaidException extends ReferenceException
{
    /**
     * Constructor.
     *
     * @param string $reference reference
     * @param string $date      date
     *
     * @return void
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     */
    public function __construct(string $reference, string $date)
    {
        parent::__construct(
            [
                AppConstants::CODE => sprintf(
                    SystemExceptionMessage::REFERENCE_ALREADY_PAID[
                        AppConstants::CODE
                    ],
                    $_ENV['APP_CODE']
                ),
                AppConstants::MESSAGE => sprintf(
                    SystemExceptionMessage::REFERENCE_ALREADY_PAID[
                        AppConstants::MESSAGE
                    ],
                    $reference,
                    $date
                ),
            ]
        );
    }
}
