<?php

/**
 * PHP Version 8.1
 * PaymentResponse.
 *
 * @category Model
 * @package  Lib\Model
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Model/PaymentResponse.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Model;

use Lib\Entity\Transaction;
use Lib\Entity\Reference;

/**
 * PaymentResponse.
 *
 * @category Model
 * @package  Lib\Model
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Model/PaymentResponse.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 *
 * @psalm-suppress MissingConstructor
 */
class PaymentResponse
{
    public int $code;
    public string $message;
    public ?Transaction $result;
    public ?Reference $referenceData;
    public ?string $externalId;
    public ?string $requestId;
    public ?string $applicationId;
    public ?string $financialId;
    public ?string $providerId = null;
    public ?int $transactionId;
}
