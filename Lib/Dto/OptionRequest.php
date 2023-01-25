<?php

/**
 * PHP Version 8.1
 * OptionRequest.
 *
 * @category Dto
 * @package  Lib\Dto
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Dto/OptionRequest.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Dto;

use JMS\Serializer\Annotation as Serializer;

/**
 * PHP Version 8.1
 * OptionRequest.
 *
 * @category Dto
 * @package  Lib\Dto
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Dto/OptionRequest.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
class OptionRequest
{
    /**
     * Name
     *
     * @Serializer\Type("string")
     */
    public ?string $name = null;

    /**
     * Slug
     *
     * @Serializer\Type("string")
     */
    public ?string $slug = null;

    /**
     * Amount
     *
     * @Serializer\Type("float")
     */
    public ?float $amount = null;

    /**
     * Reference
     *
     * @Serializer\Type("string")
     */
    public ?string $reference = null;
}
