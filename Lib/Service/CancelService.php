<?php

/**
 * PHP Version 8.1
 * CancelService.
 *
 * @category Service
 * @package  Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Service/CancelService.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Service;

use Lib\Entity\Transaction;
use Lib\Exception\IllegalStatusCancelException;

/**
 * CancelService.
 *
 * @category Service
 * @package  Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Service/CancelService.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
interface CancelService
{
    /**
     * Cancel.
     *
     * @param int $transactionId transactionId
     *
     * @return Transaction
     *
     * @throws IllegalStatusCancelException
     */
    public function cancel(int $transactionId): Transaction;
}
