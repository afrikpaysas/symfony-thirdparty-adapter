<?php

/**
 * PHP Version 8.1
 * Parameter.
 *
 * @category Entity
 * @package  Afrikpaysas\Lib\Entity
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Entity/Parameter.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Lib\Entity;

use Afrikpaysas\Lib\Model\BaseEntity;

/**
 * Parameter.
 *
 * @category Entity
 * @package  Afrikpaysas\Lib\Parameter
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Entity/Parameter.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 *
 * @SuppressWarnings(PHPMD.ShortVariable)
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class Parameter extends BaseEntity
{
    public int $id;
    public int $parameterId;
    public string $name;
    public string $slug;
    public string $value;
}
