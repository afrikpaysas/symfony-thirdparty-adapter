<?php

/**
 * PHP Version 8.1
 * ConfirmRequest.
 *
 * @category Dto
 * @package  Lib\Dto
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Dto/ConfirmRequest.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Dto;

use JMS\Serializer\Annotation as Serializer;

/**
 * ConfirmRequest.
 *
 * @category Dto
 * @package  Lib\Dto
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Dto/ConfirmRequest.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
class ConfirmRequest
{
    /**
     * TransactionId
     *
     * @Serializer\Type("int")
     */
    public ?int $transactionId = null;

    /**
     * ProviderId
     *
     * @Serializer\Type("string")
     */
    public ?string $providerId = null;
}
