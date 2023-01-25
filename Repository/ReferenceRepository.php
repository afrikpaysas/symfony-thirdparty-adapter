<?php

/**
 * PHP Version 8.1
 * ReferenceRepository.
 *
 * @category Repository
 * @package  Afrikpaysas\Repository
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Repository/ReferenceRepository.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Repository;

use Afrikpaysas\Entity\Reference;
use Doctrine\Persistence\ManagerRegistry;
use Lib\Exception\EntityNotFoundException;
use Lib\Model\AppConstants;
use Lib\Model\ReferenceCollection;
use Lib\Model\Status;
use Lib\Repository\ReferenceRepository as BaseReferenceRepository;

/**
 * ReferenceRepository.
 *
 * @template-extends    Repository<Reference>
 * @template-implements BaseReferenceRepository
 *
 * @category Repository
 * @package  Afrikpaysas\Repository
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Repository/ReferenceRepository.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
class ReferenceRepository extends Repository implements BaseReferenceRepository
{
    /**
     * Constructor.
     *
     * @param ManagerRegistry $registry registry
     *
     * @return void
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reference::class, ReferenceCollection::class);
    }

    /**
     * SaveWithReferenceNumber.
     *
     * @param string $referenceNumber referenceNumber
     *
     * @return Reference
     *
     * @throws \Exception
     */
    public function saveWithReferenceNumber(string $referenceNumber): Reference
    {
        return parent::saveWith(
            [AppConstants::REFERENCE_NUMBER => $referenceNumber]
        );
    }

    /**
     * FindOneByReferenceId.
     *
     * @param int  $referenceId referenceId
     * @param bool $throw       throw
     *
     * @return Reference|null
     *
     * @throws EntityNotFoundException
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function findOneByReferenceId(
        int $referenceId,
        bool $throw = true
    ): ?Reference {
        return parent::findOneWith(
            [AppConstants::REFERENCE_ID => $referenceId],
            $throw
        );
    }

    /**
     * FindOneByReferenceId.
     *
     * @param int  $referenceNumber referenceNumber
     * @param bool $throw           throw
     *
     * @return Reference|null
     *
     * @throws EntityNotFoundException
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function findOneByReferenceNumber(
        string $referenceNumber,
        bool $throw = true
    ) : ?Reference {
        return parent::findOneWith(
            [AppConstants::REFERENCE_NUMBER => $referenceNumber],
            $throw
        );
    }

    /**
     * FindOneByReferenceId.
     *
     * @param int    $referenceNumber referenceNumber
     * @param Status $status          status
     *
     * @return Reference
     *
     * @throws \Exception
     */
    public function updateStatus(string $referenceNumber, Status $status): Reference
    {
        return parent::updateWith(
            AppConstants::REFERENCE_NUMBER,
            $referenceNumber,
            AppConstants::STATUS,
            $status
        );
    }
}
