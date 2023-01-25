<?php

/**
 * PHP Version 8.1
 * RegulateController.
 *
 * @category Controller
 * @package  Afrikpaysas\Lib\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Controller/RegulateController.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Lib\Controller;

use Afrikpaysas\Lib\Dto\PaymentResponse;
use Afrikpaysas\Lib\Exception\PaymentException;
use Afrikpaysas\Lib\Exception\VerifyException;

/**
 * RegulateController.
 *
 * @category Controller
 * @package  Afrikpaysas\Lib\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Controller/RegulateController.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
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
