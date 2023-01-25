<?php

/**
 * PHP Version 8.1
 * PaymentVerifyService.
 *
 * @category Service
 * @package  Afrikpaysas\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Service/PaymentVerifyService.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Service;

use Lib\Dto\PaymentRequest;
use Lib\Exception\DuplicateApplicationIdException;
use Lib\Exception\DuplicateExternalIdException;
use Lib\Exception\DuplicateFinancialIdException;
use Lib\Exception\DuplicateProviderIdException;
use Lib\Exception\DuplicateRequestIdException;
use Lib\Exception\PaymentException;
use Lib\Exception\RequiredAccountNameException;
use Lib\Exception\RequiredAccountNumberException;
use Lib\Exception\RequiredApplicationIdException;
use Lib\Exception\RequiredExternalIdException;
use Lib\Exception\RequiredFinancialIdException;
use Lib\Exception\RequiredProviderIdException;
use Lib\Exception\RequiredRequestIdException;
use Lib\Service\PaymentVerifyService as BasePaymentVerifyService;
use Lib\Service\TransactionService;
use Lib\Service\VerifyService;

/**
 * PaymentVerifyService.
 *
 * @category Service
 * @package  Afrikpaysas\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Service/PaymentVerifyService.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class PaymentVerifyService implements BasePaymentVerifyService
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
            throw new RequiredApplicationIdException();
        }

        $condition = $this->transactionService->findOneByApplicationId(
            $paymentRequest->applicationId,
            false
        );

        if ($condition) {
            throw new DuplicateApplicationIdException(
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
            throw new RequiredAccountNumberException();
        }

        if (!$paymentRequest->accountName) {
            throw new RequiredAccountNameException();
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
