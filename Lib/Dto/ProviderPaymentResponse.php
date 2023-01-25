<?php

/**
 * PHP Version 8.1
 * ProviderPaymentResponse.
 *
 * @category Dto
 * @package  Lib\Dto
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Dto/ProviderPaymentResponse.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Dto;

use JMS\Serializer\Annotation as Serializer;

/**
 * ProviderPaymentResponse.
 *
 * @category Dto
 * @package  Lib\Dto
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Dto/ProviderPaymentResponse.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
class ProviderPaymentResponse
{
    /**
     * TransactionId
     *
     * @Serializer\Type("string")
     */
    public ?string $transactionId = null;

    /**
     * ProviderId
     *
     * @Serializer\Type("string")
     */
    public ?string $providerId = null;

    /**
     * ProviderStatus
     *
     * @Serializer\Type("string")
     */
    public ?string $providerStatus = null;

    /**
     * ProviderMessage
     *
     * @Serializer\Type("string")
     */
    public ?string $providerMessage = null;

    /**
     * ProviderDate
     *
     * @Serializer\Type("string")
     */
    public ?string $providerDate = null;

    /**
     * ProviderBalance
     *
     * @Serializer\Type("float")
     */
    public ?float $providerBalance = null;
}
