<?php

/**
 * PHP Version 8.1
 * PaymentService.
 *
 * @category Service
 * @package  Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Service/PaymentService.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Service;

use Lib\Dto\PaymentRequest;
use Lib\Entity\Transaction;

/**
 * PaymentService.
 *
 * @category Service
 * @package  Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Service/PaymentService.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
interface PaymentService
{
    /**
     * Pay.
     *
     * @param PaymentRequest $request request
     *
     * @return Transaction
     *
     * @throws \Throwable
     */
    public function pay(PaymentRequest $request): Transaction;
}
