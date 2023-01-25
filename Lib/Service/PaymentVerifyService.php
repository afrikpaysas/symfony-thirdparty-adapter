<?php

/**
 * PHP Version 8.1
 * PaymentVerifyService.
 *
 * @category Service
 * @package  Afrikpaysas\Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Service/PaymentVerifyService.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Lib\Service;

use Afrikpaysas\Lib\Dto\PaymentRequest;
use Afrikpaysas\Lib\Exception\DuplicateProviderIdException;
use Afrikpaysas\Lib\Exception\PaymentException;
use Afrikpaysas\Lib\Exception\RequiredProviderIdException;

/**
 * PaymentVerifyService.
 *
 * @category Service
 * @package  Afrikpaysas\Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Service/PaymentVerifyService.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
interface PaymentVerifyService
{
    /**
     * Verify.
     *
     * @param PaymentRequest $paymentRequest paymentRequest
     *
     * @return void
     *
     * @throws PaymentException
     */
    public function verify(PaymentRequest $paymentRequest): void;

    /**
     * VerifyProvider.
     *
     * @param string|null $providerId providerId
     *
     * @return void
     *
     * @throws DuplicateProviderIdException|RequiredProviderIdException
     */
    public function verifyProvider(?string $providerId): void;
}
