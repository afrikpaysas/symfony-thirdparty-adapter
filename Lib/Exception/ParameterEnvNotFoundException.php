<?php

/**
 * PHP Version 8.1
 * ParameterEnvNotFoundException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/ParameterEnvNotFoundException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Exception;

use Lib\Model\AppConstants;
use Lib\Model\SystemExceptionMessage;

/**
 * ParameterEnvNotFoundException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/ParameterEnvNotFoundException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
class ParameterEnvNotFoundException extends GeneralException
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
            SystemExceptionMessage::PARAMETER_NOT_FOUND,
            $message,
            (int)SystemExceptionMessage::PARAMETER_NOT_FOUND[AppConstants::CODE]
        );
    }
}
