<?php

/**
 * PHP Version 8.1
 * Reference.
 *
 * @category Entity
 * @package  App\Entity
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Entity/Reference.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace App\Entity;

use App\Repository\ReferenceRepository;
use Doctrine\ORM\Mapping as ORM;
use Lib\Entity\Reference as BaseReference;
use Lib\Model\Status;

/**
 * Reference.
 *
 * @category Entity
 * @package  App\Entity
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
#[ORM\Entity(repositoryClass: ReferenceRepository::class)]
class Reference extends BaseReference
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public int $id;

    #[ORM\Column(name: 'referenceId', type: 'bigint', unique: true, nullable: false)]
    public int $referenceId;

    #[ORM\Column(name: 'referenceNumber', unique: true, nullable: false)]
    public string $referenceNumber;

    #[ORM\Column(nullable: true)]
    public ?float $amount = null;

    #[ORM\Column(name: 'createdDate', type: 'datetime', nullable: false)]
    public \DateTime $createdDate;

    #[ORM\Column(name: 'lastUpdatedDate', type: 'datetime', nullable: false)]
    public \DateTime $lastUpdatedDate;

    #[ORM\Column(nullable: false)]
    public Status $status;

    #[ORM\Column(name: 'generationDate', type: 'datetime', nullable: true)]
    public ?\DateTime $generationDate;

    #[ORM\Column(name: 'expirationDate', type: 'datetime', nullable: true)]
    public ?\DateTime $expirationDate;

    #[ORM\Column(name: 'name', type: 'string', nullable: true)]
    public ?string $name;

    /**
     * Constructor.
     *
     * @return void
     *
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();
    }
}
