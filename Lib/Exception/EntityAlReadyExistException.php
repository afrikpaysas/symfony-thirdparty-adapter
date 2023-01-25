<?php

/**
 * PHP Version 8.1
 * EntityAlReadyExistException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/EntityAlReadyExistException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Exception;

use Lib\Model\AppConstants;
use Lib\Model\SystemExceptionMessage;

/**
 * PHP Version 8.1
 * EntityAlReadyExistException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/EntityAlReadyExistException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
class EntityAlReadyExistException extends GeneralException
{
    /**
     * Constructor.
     *
     * @param string|null $message message
     *
     * @return void
     */
    public function __construct(string $message = null)
    {
        parent::__construct(
            SystemExceptionMessage::ENTITY_ALREADY_EXIST,
            $message,
            (int)SystemExceptionMessage::ENTITY_ALREADY_EXIST[AppConstants::CODE]
        );
    }
}
