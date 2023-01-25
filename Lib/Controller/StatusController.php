<?php

/**
 * PHP Version 8.1
 * StatusController.
 *
 * @category Controller
 * @package  Lib\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Controller/StatusController.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Controller;

use Lib\Dto\PaymentResponse;
use Lib\Dto\StatusRequest;
use Lib\Exception\PaymentException;
use Lib\Exception\VerifyException;

/**
 * StatusController.
 *
 * @category Controller
 * @package  Lib\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Controller/StatusController.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
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
