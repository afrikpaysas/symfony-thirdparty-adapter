<?php

/**
 * PHP Version 8.1
 * BalanceController.
 *
 * @category Controller
 * @package  Lib\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Controller/BalanceController.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Controller;

use Lib\Dto\BalanceResponse;
use Lib\Exception\BalanceException;

/**
 * BalanceController.
 *
 * @category Controller
 * @package  Lib\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Controller/BalanceController.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
interface BalanceController
{
    /**
     * Balance API.
     *
     * @return BalanceResponse
     *
     * @throws BalanceException
     */
    public function balance(): BalanceResponse;
}
