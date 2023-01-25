<?php

/**
 * PHP Version 8.1
 * PaymentResponseDTO.
 *
 * @category Dto
 * @package  Lib\Dto
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Dto/PaymentResponseDTO.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Dto;

/**
 * PaymentResponseDTO.
 *
 * @category Dto
 * @package  Lib\Dto
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Dto/PaymentResponseDTO.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 *
 * @psalm-suppress MissingConstructor
 */
class PaymentResponseDTO
{
    public int $code;
    public string $message;
    public TransactionDTO $result;
    public ?ReferenceDTO $referenceData;
    public string $externalId;
    public string $requestId;
    public string $applicationId;
    public string $financialId;
    public ?string $providerId;
    public int $transactionId;
}
