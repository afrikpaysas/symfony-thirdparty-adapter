<?php

/**
 * PHP Version 8.1
 * ReferenceRepository.
 *
 * @category Model
 * @package  Lib\Model
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Model/ReferenceRepository.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Repository;

use Lib\Entity\Reference;
use Lib\Exception\EntityNotFoundException;
use Lib\Model\Status;
use PHPUnit\Util\Exception;

/**
 * ReferenceRepository.
 *
 * @template T of object
 *
 * @template-extends ServiceEntityRepositoryInterface<Reference>
 *
 * @category Model
 * @package  Lib\Model
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Model/ReferenceRepository.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
interface ReferenceRepository extends ServiceEntityRepositoryInterface
{
    /**
     * SaveWithReferenceNumber.
     *
     * @param string $referenceNumber referenceNumber
     *
     * @return Reference
     *
     * @throws \Exception
     */
    public function saveWithReferenceNumber(string $referenceNumber): Reference;

    /**
     * FindOneByReferenceNumber.
     *
     * @param string $referenceNumber referenceNumber
     * @param bool   $throw           throw
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
    ): ?Reference;

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
    ): ?Reference;

    /**
     * UpdateStatus.
     *
     * @param string $referenceNumber referenceNumber
     * @param Status $status          status
     *
     * @return Reference
     *
     * @throws \Exception
     */
    public function updateStatus(string $referenceNumber, Status $status): Reference;
}
