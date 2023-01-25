<?php

/**
 * PHP Version 8.1
 * ConfirmController.
 *
 * @category Controller
 * @package  Lib\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Controller/ConfirmController.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Controller;

use Lib\Dto\ConfirmRequest;
use Lib\Dto\PaymentResponse;
use Lib\Exception\PaymentException;

/**
 * ConfirmController.
 *
 * @category Controller
 * @package  Lib\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Controller/ConfirmController.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
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
