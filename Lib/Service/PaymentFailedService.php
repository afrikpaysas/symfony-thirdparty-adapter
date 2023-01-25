<?php

/**
 * PHP Version 8.1
 * PaymentFailedService.
 *
 * @category Service
 * @package  Afrikpaysas\Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Service/PaymentFailedService.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Lib\Service;

use Afrikpaysas\Lib\Entity\Transaction;
use Afrikpaysas\Lib\Exception\PaymentAPIException;

/**
 * PaymentFailedService.
 *
 * @category Service
 * @package  Afrikpaysas\Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Service/PaymentFailedService.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
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
