<?php

/**
 * PHP Version 8.1
 * CollectionCastException.
 *
 * @category Exception
 * @package  Afrikpaysas\Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Exception/CollectionCastException.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Lib\Exception;

use Afrikpaysas\Lib\Model\AppConstants;
use Afrikpaysas\Lib\Model\SystemExceptionMessage;

/**
 * CollectionCastException.
 *
 * @category Exception
 * @package  Afrikpaysas\Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Exception/CollectionCastException.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
class CollectionCastException extends GeneralException
{
    /**
     * Constructor.
     *
     * @param string $class class
     *
     * @return void
     */
    public function __construct(string $class)
    {
        parent::__construct(
            SystemExceptionMessage::COLLECTION_CAST_FAILURE,
            $class,
            (int)SystemExceptionMessage::COLLECTION_CAST_FAILURE[AppConstants::CODE]
        );
    }
}
