<?php

/**
 * PHP Version 8.1
 * MessagingService.
 *
 * @category Service
 * @package  Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Service/MessagingService.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Service;

use Lib\Dto\Email;
use Lib\Dto\SMS;
use Lib\Exception\EmailApiDisabled;
use Lib\Exception\GeneralNetworkException;
use Lib\Exception\NetworkException;
use Lib\Exception\SMSApiDisabled;

/**
 * MessagingService.
 *
 * @category Service
 * @package  Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Service/MessagingService.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
interface MessagingService
{
    /**
     * Sms.
     *
     * @param SMS $sms sms
     *
     * @return void
     *
     * @throws NetworkException|GeneralNetworkException|SMSApiDisabled
     */
    public function sms(SMS $sms): void;

    /**
     * Email.
     *
     * @param Email $email email
     *
     * @return void
     *
     * @throws NetworkException|GeneralNetworkException|EmailApiDisabled
     */
    public function email(Email $email): void;

    /**
     * SmsWith.
     *
     * @param string $sender  $sender
     * @param string $phone   $phone
     * @param string $message $message
     * @param string $country $country
     *
     * @return void
     *
     * @throws NetworkException|GeneralNetworkException|SMSApiDisabled
     */
    public function smsWith(
        string $sender,
        string $phone,
        string $message,
        string $country
    ): void;

    /**
     * EmailWith.
     *
     * @param string $sender  sender
     * @param string $email   email
     * @param string $message message
     * @param string $object  object
     *
     * @return void
     *
     * @throws NetworkException|GeneralNetworkException|EmailApiDisabled
     */
    public function emailWith(
        string $sender,
        string $email,
        string $message,
        string $object
    ): void;

    /**
     * SendSMS.
     *
     * @param string $phone   $phone
     * @param string $message $message
     *
     * @return void
     *
     * @throws NetworkException|GeneralNetworkException|SMSApiDisabled
     */
    public function sendSMS(string $phone, string $message): void;

    /**
     * SendEmail.
     *
     * @param string $email   email
     * @param string $message message
     * @param string $object  object
     *
     * @return void
     *
     * @throws NetworkException|GeneralNetworkException|EmailApiDisabled
     */
    public function sendEmail(string $email, string $message, string $object): void;

    /**
     * SendSMSList.
     *
     * @param string $phones  phones
     * @param string $message message
     *
     * @return void
     *
     * @throws NetworkException|GeneralNetworkException|SMSApiDisabled
     */
    public function sendSMSList(string $phones, string $message): void;

    /**
     * SendEmailList.
     *
     * @param string $emails  emails
     * @param string $message message
     * @param string $object  object
     *
     * @return void
     *
     * @throws NetworkException|GeneralNetworkException|EmailApiDisabled
     */
    public function sendEmailList(
        string $emails,
        string $message,
        string $object
    ): void;
}
