<?php

/**
 * PHP Version 8.1
 * Option.
 *
 * @category Entity
 * @package  Afrikpaysas\Lib\Entity
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Entity/Option.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Lib\Entity;

use Afrikpaysas\Lib\Model\BaseEntity;

/**
 * PHP Version 8.1
 * AppResponse.
 *
 * @category Entity
 * @package  Afrikpaysas\Lib\Entity
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Entity/Option.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
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
