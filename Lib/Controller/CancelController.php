<?php

/**
 * PHP Version 8.1
 * CancelController.
 *
 * @category Controller
 * @package  Lib\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Controller/CancelController.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Controller;

use Lib\Dto\PaymentResponse;
use Lib\Exception\PaymentException;

/**
 * CancelController.
 *
 * @category Controller
 * @package  Lib\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Controller/CancelController.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
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
