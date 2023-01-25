<?php

/**
 * PHP Version 8.1
 * InvalidReferenceSlugOptionException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/InvalidReferenceSlugOptionException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Exception;

use Lib\Model\AppConstants;
use Lib\Model\SystemExceptionMessage;

/**
 * InvalidReferenceSlugOptionException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/InvalidReferenceSlugOptionException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
class InvalidReferenceSlugOptionException extends VerifyException
{
    /**
     * Constructor.
     *
     * @param string $reference reference
     * @param string $slug      slug
     *
     * @return void
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     */
    public function __construct(string $reference, string $slug)
    {
        parent::__construct(
            [
                AppConstants::CODE => sprintf(
                    SystemExceptionMessage::OPTION_REFERENCE_SLUG_NOT_FOUND[
                        AppConstants::CODE
                    ],
                    $_ENV['APP_CODE']
                ),
                AppConstants::MESSAGE => sprintf(
                    SystemExceptionMessage::OPTION_REFERENCE_SLUG_NOT_FOUND[
                        AppConstants::MESSAGE
                    ],
                    $slug,
                    $reference
                ),
            ]
        );
    }
}
