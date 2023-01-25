<?php

/**
 * PHP Version 8.1
 * BalanceService.
 *
 * @category Service
 * @package  Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Service/BalanceService.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Service;

use Lib\Exception\BalanceApplicationException;

/**
 * BalanceService.
 *
 * @category Service
 * @package  Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Service/BalanceService.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
interface BalanceService
{
    /**
     * Balance.
     *
     * @return float
     *
     * @throws BalanceApplicationException
     */
    public function balance(): float;

    /**
     * SetBalance.
     *
     * @param float $balance balance
     *
     * @return void
     *
     * @throws BalanceApplicationException
     */
    public function setBalance(float $balance): void;
}
