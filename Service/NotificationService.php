<?php

/**
 * PHP Version 8.1
 * NotificationService.
 *
 * @category Service
 * @package  Afrikpaysas\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Service/NotificationService.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Service;

use Lib\Entity\Transaction as BaseTransaction;
use Lib\Model\AppConstants;
use Lib\Service\MessagingService;
use Lib\Service\NotificationService as BaseNotificationService;
use Lib\Service\ReferenceService;
use Lib\Service\VerifyService;
use \DateTimeZone;
use \DateTime;

/**
 * NotificationService.
 *
 * @category Service
 * @package  Afrikpaysas\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Service/NotificationService.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
class NotificationService implements BaseNotificationService
{
    protected MessagingService $messagingService;
    protected ReferenceService $referenceService;
    protected VerifyService $verifyService;

    /**
     * Constructor.
     *
     * @param MessagingService $messagingService messagingService
     * @param ReferenceService $referenceService referenceService
     * @param VerifyService    $verifyService    verifyService
     *
     * @return void
     */
    public function __construct(
        MessagingService $messagingService,
        ReferenceService $referenceService,
        VerifyService $verifyService
    ) {
        $this->messagingService = $messagingService;
        $this->referenceService = $referenceService;
        $this->verifyService = $verifyService;
    }

    /**
     * Notification.
     *
     * @param BaseTransaction $transaction transaction
     *
     * @return void
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     *
     * @psalm-suppress PossiblyNullArgument
     * @psalm-suppress PossiblyUndefinedArrayOffset
     */
    public function notification(BaseTransaction $transaction): void
    {
        if (AppConstants::PARAMETER_TRUE_VALUE == $_ENV['PHONE_ENABLED']) {
            $this->verifyService->verifyPhone($transaction->phone);
            $this->messagingService->sendSMS(
                $transaction->phone,
                $this->generateClientSMS($transaction)
            );
        }
        if (AppConstants::PARAMETER_TRUE_VALUE == $_ENV['EMAIL_ENABLED']) {
            $this->verifyService->verifyEmail($transaction->email);
            $this->messagingService->sendEmail(
                $transaction->email,
                $this->generateClientEmail($transaction),
                $_ENV['EMAIL_CLIENT_OBJECT']
            );
        }
        if (AppConstants::PARAMETER_TRUE_VALUE == $_ENV['NOTIF_ADMIN_PHONES']) {
            $this->messagingService->sendSMSList(
                $_ENV['ADMIN_PHONES'],
                $this->generateAdminSMS($transaction)
            );
        }
        if (AppConstants::PARAMETER_TRUE_VALUE == $_ENV['NOTIF_ADMIN_EMAILS']) {
            $this->messagingService->sendEmailList(
                $_ENV['ADMIN_EMAILS'],
                $this->generateAdminEmail($transaction),
                $_ENV['EMAIL_ADMIN_OBJECT']
            );
        }
    }

    /**
     * GenerateClientSMS.
     *
     * @param BaseTransaction $transaction transaction
     *
     * @return string
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     */
    public function generateClientSMS(BaseTransaction $transaction): string
    {
        $reference = $this->referenceService->findByReferenceNumber(
            $transaction->reference
        );

        return sprintf(
            $_ENV['NOTIF_SMS_MESSAGE'],
            $reference->referenceNumber,
            $reference->lastUpdatedDate->setTimezone(
                new DateTimeZone($_ENV['TIME_ZONE_PROVIDER'])
            )->format(
                $_ENV['API_DATE_FORMAT']
            ),
            $reference->name ?? '',
            $reference->amount ?? ''
        );
    }

    /**
     * GenerateAdminSMS.
     *
     * @param BaseTransaction $transaction transaction
     *
     * @return string
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     */
    public function generateAdminSMS(BaseTransaction $transaction): string
    {
        $reference = $this->referenceService->findByReferenceNumber(
            $transaction->reference
        );

        return sprintf(
            $_ENV['NOTIF_SMS_ADMIN_MESSAGE'],
            $reference->referenceNumber,
            $reference->lastUpdatedDate->setTimezone(
                new DateTimeZone($_ENV['TIME_ZONE_PROVIDER'])
            )->format(
                $_ENV['API_DATE_FORMAT']
            ),
            $reference->name ?? '',
            $reference->amount ?? ''
        );
    }

    /**
     * GenerateClientEmail.
     *
     * @param BaseTransaction $transaction transaction
     *
     * @return string
     */
    public function generateClientEmail(BaseTransaction $transaction): string
    {
        return $transaction->toEmailString(AppConstants::TRANSACTIONS_DETAILS);
    }

    /**
     * GenerateAdminEmail.
     *
     * @param BaseTransaction $transaction transaction
     *
     * @return string
     */
    public function generateAdminEmail(BaseTransaction $transaction): string
    {
        return $transaction->toEmailString(AppConstants::TRANSACTIONS_DETAILS);
    }
}
