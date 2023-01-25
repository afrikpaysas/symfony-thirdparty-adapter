<?php

/**
 * PHP Version 8.1
 * ConfigController.
 *
 * @category Controller
 * @package  Lib\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Controller/ConfigController.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Controller;

use Lib\Dto\ArrayResponse;
use Lib\Exception\ConfigException;

/**
 * ConfigController.
 *
 * @category Controller
 * @package  Lib\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Controller/ConfigController.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
interface ConfigController
{
    /**
     * Parameters API.
     *
     * @return ArrayResponse
     *
     * @throws ConfigException
     */
    public function parameters(): ArrayResponse;

    /**
     * Exceptions API.
     *
     * @return ArrayResponse
     */
    public function exceptions(): ArrayResponse;
}
