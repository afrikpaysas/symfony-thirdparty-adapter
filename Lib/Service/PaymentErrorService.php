<?php

/**
 * PHP Version 8.1
 * PaymentErrorService.
 *
 * @category Service
 * @package  Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Service/PaymentErrorService.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Service;

use Lib\Entity\Transaction;
use Lib\Exception\RegulateException;

/**
 * PaymentErrorService.
 *
 * @category Service
 * @package  Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Service/PaymentErrorService.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
interface PaymentErrorService
{
    /**
     * Error.
     *
     * @param \Throwable  $exception   exception
     * @param Transaction $transaction transaction
     *
     * @return RegulateException
     */
    public function error(
        \Throwable $exception,
        Transaction $transaction
    ): RegulateException;
}
