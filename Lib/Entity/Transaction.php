<?php

/**
 * PHP Version 8.1
 * Transaction.
 *
 * @category Entity
 * @package  Lib\Entity
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Entity/Transaction.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Entity;

use Lib\Model\BaseEntity;

/**
 * Transaction.
 *
 * @category Entity
 * @package  Lib\Entity
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Entity/Transaction.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 *
 * @SuppressWarnings(PHPMD.TooManyFields)
 * @SuppressWarnings(PHPMD.ShortVariable)
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class Transaction extends BaseEntity
{
    public int $id;
    public int $transactionId;
    public string $reference;
    public string $accountNumber;
    public string $accountName;
    public float $amount;
    public ?string $phone;
    public ?string $email;
    public ?string $option;
    public string $externalId;
    public string $requestId;
    public string $applicationId;
    public string $financialId;
    public ?string $providerId;
    public ?string $providerStatus;
    public ?string $providerDate;
    public ?string $providerMessage;
    public ?float $providerBalance;
    public ?Reference $referenceData;
}
