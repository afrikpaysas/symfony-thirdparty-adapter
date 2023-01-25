<?php

/**
 * PHP Version 8.1
 * CancelController.
 *
 * @category Controller
 * @package  Afrikpaysas\Lib\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Controller/CancelController.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Lib\Controller;

use Afrikpaysas\Lib\Dto\PaymentResponse;
use Afrikpaysas\Lib\Exception\PaymentException;

/**
 * CancelController.
 *
 * @category Controller
 * @package  Afrikpaysas\Lib\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Controller/CancelController.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
interface CancelController
{
    /**
     * Cancel API.
     *
     * @param int $transactionId transactionId
     *
     * @return PaymentResponse
     *
     * @throws PaymentException
     */
    public function cancel(int $transactionId): PaymentResponse;
}
