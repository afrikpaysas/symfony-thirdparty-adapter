<?php

/**
 * PHP Version 8.1
 * ListEntityNotFoundException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/ListEntityNotFoundException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Exception;

use Lib\Model\AppConstants;
use Lib\Model\SystemExceptionMessage;

/**
 * ListEntityNotFoundException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/ListEntityNotFoundException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
class ListEntityNotFoundException extends GeneralException
{
    /**
     * Constructor.
     *
     * @param string|null $message message
     *
     * @return void
     */
    public function __construct(?string $message = null)
    {
        $messageTxt = $message ?? '';
        parent::__construct(
            SystemExceptionMessage::LIST_ENTITY_NOT_FOUND,
            $messageTxt,
            (int)SystemExceptionMessage::LIST_ENTITY_NOT_FOUND[AppConstants::CODE]
        );
    }
}
