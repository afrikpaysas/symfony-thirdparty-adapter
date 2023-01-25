<?php

/**
 * PHP Version 8.1
 * PaymentFailedService.
 *
 * @category Service
 * @package  Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Service/PaymentFailedService.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Service;

use Lib\Entity\Transaction;
use Lib\Exception\PaymentAPIException;

/**
 * PaymentFailedService.
 *
 * @category Service
 * @package  Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Service/PaymentFailedService.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
interface PaymentFailedService
{
    /**
     * Failed.
     *
     * @param PaymentAPIException $exception   exception
     * @param Transaction         $transaction transaction
     *
     * @return PaymentAPIException
     */
    public function failed(
        PaymentAPIException $exception,
        Transaction $transaction
    ): PaymentAPIException;
}
