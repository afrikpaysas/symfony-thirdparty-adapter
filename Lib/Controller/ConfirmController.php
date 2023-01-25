<?php

/**
 * PHP Version 8.1
 * ConfirmController.
 *
 * @category Controller
 * @package  Afrikpaysas\Lib\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Controller/ConfirmController.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Lib\Controller;

use Afrikpaysas\Lib\Dto\ConfirmRequest;
use Afrikpaysas\Lib\Dto\PaymentResponse;
use Afrikpaysas\Lib\Exception\PaymentException;

/**
 * ConfirmController.
 *
 * @category Controller
 * @package  Afrikpaysas\Lib\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Controller/ConfirmController.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
interface ConfirmController
{
    /**
     * Confirm API.
     *
     * @param ConfirmRequest $request request
     *
     * @return PaymentResponse
     *
     * @throws PaymentException
     */
    public function confirm(ConfirmRequest $request): PaymentResponse;
}
