<?php

/**
 * PHP Version 8.1
 * InvalidTypeCollectionException.
 *
 * @category Exception
 * @package  Afrikpaysas\Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Exception/InvalidTypeCollectionException.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Lib\Exception;

use Afrikpaysas\Lib\Model\AppConstants;
use Afrikpaysas\Lib\Model\SystemExceptionMessage;

/**
 * InvalidTypeCollectionException.
 *
 * @category Exception
 * @package  Afrikpaysas\Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Exception/InvalidTypeCollectionException.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
class InvalidTypeCollectionException extends GeneralException
{
    /**
     * Constructor.
     *
     * @param string $type           type
     * @param string $collectionType collectionType
     *
     * @return void
     */
    public function __construct(string $type, ?string $collectionType)
    {
        $collectionTypeText = $collectionType ?? '';
        $text = sprintf(
            SystemExceptionMessage::INVALID_TYPE_COLLECTION_FAILURE[
                AppConstants::MESSAGE
            ],
            $type,
            $collectionTypeText
        );

        $exceptionDetail = [
            AppConstants::CODE =>
                SystemExceptionMessage::INVALID_TYPE_COLLECTION_FAILURE[
                    AppConstants::CODE
                ],
            AppConstants::MESSAGE => $text,
        ];

        parent::__construct($exceptionDetail);
    }
}
