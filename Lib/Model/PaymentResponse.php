<?php

/**
 * PHP Version 8.1
 * PaymentResponse.
 *
 * @category Model
 * @package  Afrikpaysas\Lib\Model
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Model/PaymentResponse.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Lib\Model;

use Afrikpaysas\Lib\Entity\Transaction;
use Afrikpaysas\Lib\Entity\Reference;

/**
 * PaymentResponse.
 *
 * @category Model
 * @package  Afrikpaysas\Lib\Model
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Model/PaymentResponse.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
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
