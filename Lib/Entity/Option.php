<?php

/**
 * PHP Version 8.1
 * Option.
 *
 * @category Entity
 * @package  Lib\Entity
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Entity/Option.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Entity;

use Lib\Model\BaseEntity;

/**
 * PHP Version 8.1
 * AppResponse.
 *
 * @category Entity
 * @package  Lib\Entity
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Entity/Option.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 *
 * @SuppressWarnings(PHPMD.ShortVariable)
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class Option extends BaseEntity
{
    public int $id;
    public int $optionId;
    public string $name;
    public string $slug;
    public float $amount;
    public ?string $reference;
}
