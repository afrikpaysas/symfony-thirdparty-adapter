<?php

/**
 * PHP Version 8.1
 * Option.
 *
 * @category Model
 * @package  Lib\Model
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Model/Option.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Model;

/**
 * Option.
 *
 * @category Model
 * @package  Lib\Model
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Model/Option.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 *
 * @psalm-suppress MissingConstructor
 */
class Option
{
    public int $optionId;
    public ?string $name = null;
    public ?string $slug = null;
    public ?float $amount = null;
    public ?string $reference = null;
    public ?Status $status = null;
    public ?string $date = null;
}
