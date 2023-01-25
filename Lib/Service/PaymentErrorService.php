<?php

/**
 * PHP Version 8.1
 * PaymentErrorService.
 *
 * @category Service
 * @package  Afrikpaysas\Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Service/PaymentErrorService.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Lib\Service;

use Afrikpaysas\Lib\Entity\Transaction;
use Afrikpaysas\Lib\Exception\RegulateException;

/**
 * PaymentErrorService.
 *
 * @category Service
 * @package  Afrikpaysas\Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Service/PaymentErrorService.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
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
