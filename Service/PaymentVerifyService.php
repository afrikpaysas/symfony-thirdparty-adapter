<?php

/**
 * PHP Version 8.1
 * PaymentVerifyService.
 *
 * @category Service
 * @package  Afrikpaysas\SymfonyThirdpartyAdapter\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Service/PaymentVerifyService.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\SymfonyThirdpartyAdapter\Service;

use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Dto\PaymentRequest;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Exception\DuplicateApplicationIdE;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Exception\DuplicateExternalIdException;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Exception\DuplicateFinancialIdException;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Exception\DuplicateProviderIdException;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Exception\DuplicateRequestIdException;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Exception\PaymentException;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Exception\RequiredAccountNameExc;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Exception\RequiredAccountNumberExc;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Exception\RequiredApplicationIdExc;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Exception\RequiredExternalIdException;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Exception\RequiredFinancialIdException;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Exception\RequiredProviderIdException;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Exception\RequiredRequestIdException;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Service\PaymentVerifyService as PyVerfS;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Service\TransactionService;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Service\VerifyService;

/**
 * PaymentVerifyService.
 *
 * @category Service
 * @package  Afrikpaysas\SymfonyThirdpartyAdapter\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Service/PaymentVerifyService.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class PaymentVerifyService implements PyVerfS
{
    protected TransactionService $transactionService;
    protected VerifyService $verifyService;

    /**
     * Constructor.
     *
     * @param TransactionService $transactionService transactionService
     * @param VerifyService      $verifyService      verifyService
     *
     * @return void
     */
    public function __construct(
        TransactionService $transactionService,
        VerifyService $verifyService
    ) {
        $this->transactionService = $transactionService;
        $this->verifyService = $verifyService;
    }

    /**
     * Verify.
     *
     * @param PaymentRequest $paymentRequest paymentRequest
     *
     * @return void
     *
     * @throws PaymentException
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function verify(PaymentRequest $paymentRequest): void
    {
        $this->verifyService->verify($paymentRequest);

        if (!$paymentRequest->applicationId) {
            throw new RequiredApplicationIdExc();
        }

        $condition = $this->transactionService->findOneByApplicationId(
            $paymentRequest->applicationId,
            false
        );

        if ($condition) {
            throw new DuplicateApplicationIdE(
                $paymentRequest->applicationId
            );
        }

        if (!$paymentRequest->requestId) {
            throw new RequiredRequestIdException();
        }

        $condition = $this->transactionService->findOneByRequestId(
            $paymentRequest->requestId,
            false
        );

        if ($condition) {
            throw new DuplicateRequestIdException($paymentRequest->requestId);
        }

        if (!$paymentRequest->externalId) {
            throw new RequiredExternalIdException();
        }

        $condition = $this->transactionService->findOneByExternalId(
            $paymentRequest->externalId,
            false
        );

        if ($condition) {
            throw new DuplicateExternalIdException($paymentRequest->externalId);
        }

        if (!$paymentRequest->financialId) {
            throw new RequiredFinancialIdException();
        }

        $condition =$this->transactionService->findOneByFinancialId(
            $paymentRequest->financialId,
            false
        );

        if ($condition) {
            throw new DuplicateFinancialIdException($paymentRequest->financialId);
        }

        if (!$paymentRequest->accountNumber) {
            throw new RequiredAccountNumberExc();
        }

        if (!$paymentRequest->accountName) {
            throw new RequiredAccountNameExc();
        }
    }

    /**
     * VerifyProvider.
     *
     * @param string|null $providerId providerId
     *
     * @return void
     *
     * @throws DuplicateProviderIdException|RequiredProviderIdException
     */
    public function verifyProvider(?string $providerId): void
    {
        if (!$providerId) {
            throw new RequiredProviderIdException();
        }

        $condition = $this->transactionService->findOneByProviderId(
            $providerId,
            false
        );

        if ($condition) {
            throw new DuplicateProviderIdException($providerId);
        }
    }
}
