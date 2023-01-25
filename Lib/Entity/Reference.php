<?php

/**
 * PHP Version 8.1
 * Reference.
 *
 * @category Entity
 * @package  Afrikpaysas\Lib\Entity
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Entity/Reference.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Lib\Entity;

use Afrikpaysas\Lib\Model\BaseEntity;
use Afrikpaysas\Lib\Model\Collection;
use Afrikpaysas\Lib\Model\OptionCollection;

/**
 * Reference.
 *
 * @category Entity
 * @package  Afrikpaysas\Lib\Entity
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Entity/Reference.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
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
