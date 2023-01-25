<?php

/**
 * PHP Version 8.1
 * PaymentController.
 *
 * @category Controller
 * @package  Afrikpaysas\Lib\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Controller/PaymentController.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Lib\Controller;

use Afrikpaysas\Lib\Dto\PaymentRequest;
use Afrikpaysas\Lib\Dto\PaymentResponse;
use Afrikpaysas\Lib\Exception\PaymentException;
use Afrikpaysas\Lib\Exception\VerifyException;

/**
 * PaymentController.
 *
 * @category Controller
 * @package  Afrikpaysas\Lib\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Controller/PaymentController.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
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
