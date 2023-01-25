<?php

/**
 * PHP Version 8.1
 * Parameter.
 *
 * @category Entity
 * @package  Lib\Entity
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Entity/Parameter.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Entity;

use Lib\Model\BaseEntity;

/**
 * Parameter.
 *
 * @category Entity
 * @package  Lib\Parameter
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Entity/Parameter.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
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
