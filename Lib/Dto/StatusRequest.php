<?php

/**
 * PHP Version 8.1
 * StatusRequest.
 *
 * @category Dto
 * @package  Lib\Dto
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Dto/StatusRequest.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Dto;

use JMS\Serializer\Annotation as Serializer;

/**
 * StatusRequest.
 *
 * @category Dto
 * @package  Lib\Dto
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Dto/StatusRequest.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
class StatusRequest
{
    /**
     * Reference
     *
     * @Serializer\Type("string")
     */
    public ?string $reference = null;

    /**
     * Amount
     *
     * @Serializer\Type("float")
     */
    public ?float $amount = null;

    /**
     * ExternalId
     *
     * @Serializer\Type("string")
     */
    public ?string $externalId = null;

    /**
     * RequestId
     *
     * @Serializer\Type("string")
     */
    public ?string $requestId = null;

    /**
     * ApplicationId
     *
     * @Serializer\Type("string")
     */
    public ?string $applicationId = null;

    /**
     * FinancialId
     *
     * @Serializer\Type("string")
     */
    public ?string $financialId = null;

    /**
     * ProviderId
     *
     * @Serializer\Type("string")
     */
    public ?string $providerId = null;

    /**
     * TransactionId
     *
     * @Serializer\Type("int")
     */
    public ?int $transactionId = null;
}
