<?php

/**
 * PHP Version 8.1
 * StatusController.
 *
 * @category Controller
 * @package  Afrikpaysas\Lib\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Controller/StatusController.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Lib\Controller;

use Afrikpaysas\Lib\Dto\PaymentResponse;
use Afrikpaysas\Lib\Dto\StatusRequest;
use Afrikpaysas\Lib\Exception\PaymentException;
use Afrikpaysas\Lib\Exception\VerifyException;

/**
 * StatusController.
 *
 * @category Controller
 * @package  Afrikpaysas\Lib\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Controller/StatusController.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
interface StatusController
{
    /**
     * Status API.
     *
     * @param StatusRequest $request request
     *
     * @return PaymentResponse
     *
     * @throws VerifyException|PaymentException
     */
    public function status(StatusRequest $request): PaymentResponse;
}
