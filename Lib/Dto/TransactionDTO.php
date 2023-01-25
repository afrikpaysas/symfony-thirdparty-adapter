<?php

/**
 * PHP Version 8.1
 * TransactionDTO.
 *
 * @category Dto
 * @package  Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Dto
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Dto/TransactionDTO.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Dto;

use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Model\BaseEntityDTO;

/**
 * PHP Version 8.1
 * TransactionDTO.
 *
 * @category Dto
 * @package  Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Dto
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Dto/TransactionDTO.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 *
 * @SuppressWarnings(PHPMD.TooManyFields)
 *
 * @psalm-suppress MissingConstructor
 */
class TransactionDTO extends BaseEntityDTO
{
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
}
