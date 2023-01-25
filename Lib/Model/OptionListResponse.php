<?php

/**
 * PHP Version 8.1
 * OptionListResponse.
 *
 * @category Model
 * @package  Lib\Model
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Model/OptionListResponse.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Model;

/**
 * OptionListResponse.
 *
 * @category Model
 * @package  Lib\Model
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Model/OptionListResponse.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 *
 * @psalm-suppress MissingConstructor
 */
class OptionListResponse
{
    public int $code;
    public string $message;
    public ?OptionDTOCollection $result;
}
