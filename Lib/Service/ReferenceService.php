<?php

/**
 * PHP Version 8.1
 * ReferenceService.
 *
 * @category Service
 * @package  Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Service/ReferenceService.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Service;

use Lib\Dto\ReferenceApiResponse;
use Lib\Entity\Reference;
use Lib\Exception\BadApiResponse;
use Lib\Exception\PaymentAPIException;
use Lib\Exception\PaymentException;
use Lib\Exception\ReferenceNotFoundException;
use Lib\Model\Status;

/**
 * ReferenceService.
 *
 * @category Service
 * @package  Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Service/ReferenceService.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
interface ReferenceService
{
    /**
     * Create.
     *
     * @param Reference $reference reference
     *
     * @return Reference
     */
    public function create(Reference $reference): Reference;

    /**
     * CreateWith.
     *
     * @param string $referenceNumber referenceNumber
     *
     * @return Reference
     */
    public function createWith(string $referenceNumber): Reference;

    /**
     * FindByReferenceNumber.
     *
     * @param string $referenceNumber referenceNumber
     *
     * @return Reference
     */
    public function findByReferenceNumber(string $referenceNumber): Reference;

    /**
     * FindByApi.
     *
     * @param string $referenceNumber referenceNumber
     *
     * @return Reference
     */
    public function findByApi(string $referenceNumber): Reference;

    /**
     * GenerateReferenceResponse.
     *
     * @param string     $referenceNumber referenceNumber
     * @param array|null $data            data
     *
     * @return ReferenceApiResponse
     *
     * @throws BadApiResponse|PaymentAPIException|ReferenceNotFoundException
     */
    public function generateReferenceResponse(
        string $referenceNumber,
        ?array $data
    ): ReferenceApiResponse;

    /**
     * GetAmount.
     *
     * @param string $referenceNumber referenceNumber
     *
     * @return float
     *
     * @throws \Exception
     */
    public function getAmount(string $referenceNumber): float;

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
