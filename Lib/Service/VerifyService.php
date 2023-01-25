<?php

/**
 * PHP Version 8.1
 * VerifyService.
 *
 * @category Service
 * @package  Afrikpaysas\Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Service/VerifyService.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Lib\Service;

use Afrikpaysas\Lib\Dto\VerifyRequest;
use Afrikpaysas\Lib\Exception\BadEmailException;
use Afrikpaysas\Lib\Exception\BadPhoneException;
use Afrikpaysas\Lib\Exception\BadReferenceException;
use Afrikpaysas\Lib\Exception\InvalidAmountException;
use Afrikpaysas\Lib\Exception\InvalidAmountOptionException;
use Afrikpaysas\Lib\Exception\InvalidOptionException;
use Afrikpaysas\Lib\Exception\ReferenceApiDisabledException;

/**
 * VerifyService.
 *
 * @category Service
 * @package  Afrikpaysas\Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Service/VerifyService.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
interface VerifyService
{
    /**
     * VerifyReference.
     *
     * @param string|null $reference reference
     *
     * @return void
     *
     * @throws BadReferenceException
     */
    public function verifyReference(?string $reference = null): void;

    /**
     * VerifyAmount.
     *
     * @param float|null $amount amount
     *
     * @return void
     *
     * @throws InvalidAmountException
     */
    public function verifyAmount(?float $amount = null): void;

    /**
     * VerifyOption.
     *
     * @param string|null $option option
     * @param float|null  $amount amount
     *
     * @return void
     *
     * @throws InvalidOptionException|InvalidAmountOptionException
     */
    public function verifyOption(
        ?string $option = null,
        ?float $amount = null
    ): void;

    /**
     * VerifyPhone.
     *
     * @param string|null $phone phone
     *
     * @return void
     *
     * @throws BadPhoneException
     */
    public function verifyPhone(?string $phone = null): void;

    /**
     * VerifyEmail.
     *
     * @param string|null $email email
     *
     * @return void
     *
     * @throws BadEmailException
     */
    public function verifyEmail(?string $email = null): void;

    /**
     * VerifyReferenceAPI.
     *
     * @return void
     *
     * @throws ReferenceApiDisabledException
     */
    public function verifyReferenceAPI(): void;

    /**
     * Verify.
     *
     * @param VerifyRequest $request request
     *
     * @return void
     *
     * @throws BadReferenceException|InvalidAmountException|InvalidOptionException|InvalidAmountOptionException|BadPhoneException|BadEmailException
     */
    public function verify(VerifyRequest $request): void;
}
