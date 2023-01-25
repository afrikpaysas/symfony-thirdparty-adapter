<?php

/**
 * PHP Version 8.1
 * RegulateController.
 *
 * @category Controller
 * @package  Lib\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Controller/RegulateController.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Controller;

use Lib\Dto\PaymentResponse;
use Lib\Exception\PaymentException;
use Lib\Exception\VerifyException;

/**
 * RegulateController.
 *
 * @category Controller
 * @package  Lib\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Controller/RegulateController.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
interface RegulateController
{
    /**
     * Regulate API.
     *
     * @param int    $transactionId transactionId
     * @param string $providerId    providerId
     *
     * @return PaymentResponse
     *
     * @throws VerifyException|PaymentException
     */
    public function regulate(
        int $transactionId,
        string $providerId
    ): PaymentResponse;
}
