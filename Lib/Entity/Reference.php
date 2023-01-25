<?php

/**
 * PHP Version 8.1
 * Reference.
 *
 * @category Entity
 * @package  Lib\Entity
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Entity/Reference.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Entity;

use Lib\Model\BaseEntity;
use Lib\Model\Collection;
use Lib\Model\OptionCollection;

/**
 * Reference.
 *
 * @category Entity
 * @package  Lib\Entity
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Entity/Reference.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 *
 * @SuppressWarnings(PHPMD.ShortVariable)
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class Reference extends BaseEntity
{
    public int $id;
    public int $referenceId;
    public string $referenceNumber;
    public ?float $amount = null;
    public ?\DateTime $generationDate;
    public ?\DateTime $expirationDate;
    public ?string $name;
    /**
     * Options.
     *
     * @var Collection<Option>|OptionCollection|null
     */
    public Collection|OptionCollection|null $options = null;
}
