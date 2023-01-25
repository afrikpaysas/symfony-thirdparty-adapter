<?php

/**
 * PHP Version 8.1
 * AppResponse.
 *
 * @category Dto
 * @package  Lib\Dto
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Dto/AppResponse.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Dto;

use JMS\Serializer\Annotation as Serializer;

/**
 * PHP Version 8.1
 * VerifyRequest.
 *
 * @category Dto
 * @package  Lib\Dto
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Dto/VerifyRequest.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
class VerifyRequest
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
     * Phone
     *
     * @Serializer\Type("string")
     */
    public ?string $phone = null;

    /**
     * Email
     *
     * @Serializer\Type("string")
     */
    public ?string $email = null;

    /**
     * Option
     *
     * @Serializer\Type("string")
     */
    public ?string $option = null;
}
