<?php

/**
 * PHP Version 8.1
 * NotificationService.
 *
 * @category Service
 * @package  Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Service/NotificationService.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Service;

use Lib\Entity\Transaction;

/**
 * NotificationService.
 *
 * @category Service
 * @package  Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Service/NotificationService.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
interface NotificationService
{
    /**
     * Notification.
     *
     * @param Transaction $transaction transaction
     *
     * @return void
     */
    public function notification(Transaction $transaction): void;

    /**
     * GenerateClientSMS.
     *
     * @param Transaction $transaction transaction
     *
     * @return string
     */
    public function generateClientSMS(Transaction $transaction): string;

    /**
     * GenerateAdminSMS.
     *
     * @param Transaction $transaction transaction
     *
     * @return string
     */
    public function generateAdminSMS(Transaction $transaction): string;

    /**
     * GenerateClientEmail.
     *
     * @param Transaction $transaction transaction
     *
     * @return string
     */
    public function generateClientEmail(Transaction $transaction): string;

    /**
     * GenerateAdminEmail.
     *
     * @param Transaction $transaction transaction
     *
     * @return string
     */
    public function generateAdminEmail(Transaction $transaction): string;
}
