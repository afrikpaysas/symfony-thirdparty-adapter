<?php

/**
 * PHP Version 8.1
 * PaymentController.
 *
 * @category Controller
 * @package  Lib\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Controller/PaymentController.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Controller;

use Lib\Dto\PaymentRequest;
use Lib\Dto\PaymentResponse;
use Lib\Exception\PaymentException;
use Lib\Exception\VerifyException;

/**
 * PaymentController.
 *
 * @category Controller
 * @package  Lib\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Controller/PaymentController.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
interface PaymentController
{
    /**
     * Pay API.
     *
     * @param PaymentRequest $request request
     *
     * @return PaymentResponse
     *
     * @throws VerifyException|PaymentException
     */
    public function pay(PaymentRequest $request): PaymentResponse;
}
