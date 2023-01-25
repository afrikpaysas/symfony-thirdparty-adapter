<?php

/**
 * PHP Version 8.1
 * StatusService.
 *
 * @category Service
 * @package  Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Service/StatusService.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Service;

use Lib\Dto\StatusRequest;
use Lib\Entity\Transaction;

/**
 * StatusService.
 *
 * @category Service
 * @package  Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Service/StatusService.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
interface StatusService
{
    /**
     * Status.
     *
     * @param StatusRequest $request request
     *
     * @return Transaction
     */
    public function status(StatusRequest $request): Transaction;
}
