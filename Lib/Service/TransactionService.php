<?php

/**
 * PHP Version 8.1
 * TransactionService.
 *
 * @category Service
 * @package  Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Service/TransactionService.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Service;

use Lib\Entity\Transaction;
use Lib\Exception\EntityAlReadyExistException;
use Lib\Exception\EntityNotFoundException;
use Lib\Model\Status;

/**
 * TransactionService.
 *
 * @category Service
 * @package  Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Service/TransactionService.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
interface TransactionService
{
    /**
     * Save.
     *
     * @param Transaction $transaction transaction
     *
     * @return Transaction
     */
    public function save(Transaction $transaction): Transaction;

    /**
     * Find.
     *
     * @param int $id id
     *
     * @return Transaction
     *
     * @throws EntityNotFoundException
     *
     * @SuppressWarnings(PHPMD.ShortVariable)
     */
    public function find(int $id): Transaction;

    /**
     * FindOneByTransactionId.
     *
     * @param int  $transactionId transactionId
     * @param bool $throw         throw
     *
     * @return Transaction|null
     *
     * @throws EntityNotFoundException
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function findOneByTransactionId(
        int $transactionId,
        bool $throw = true
    ): ?Transaction;

    /**
     * FindOneByFinancialId.
     *
     * @param string $financialId financialId
     * @param bool   $throw       throw
     *
     * @return Transaction|null
     *
     * @throws EntityNotFoundException
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function findOneByFinancialId(
        string $financialId,
        bool $throw = true
    ): ?Transaction;

    /**
     * FindOneByApplicationId.
     *
     * @param string $applicationId applicationId
     * @param bool   $throw         throw
     *
     * @return Transaction|null
     *
     * @throws EntityNotFoundException
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function findOneByApplicationId(
        string $applicationId,
        bool $throw = true
    ): ?Transaction;

    /**
     * FindOneByExternalId.
     *
     * @param string $externalId externalId
     * @param bool   $throw      throw
     *
     * @return Transaction|null
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function findOneByExternalId(
        string $externalId,
        bool $throw = true
    ): ?Transaction;

    /**
     * FindOneByRequestId.
     *
     * @param string $requestId requestId
     * @param bool   $throw     throw
     *
     * @return Transaction|null
     *
     * @throws EntityNotFoundException
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function findOneByRequestId(
        string $requestId,
        bool $throw = true
    ): ?Transaction;

    /**
     * FindOneByProviderId.
     *
     * @param string $providerId providerId
     * @param bool   $throw      throw
     *
     * @return Transaction|null
     *
     * @throws EntityNotFoundException
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function findOneByProviderId(
        string $providerId,
        bool $throw = true
    ): ?Transaction;

    /**
     * FindOneBy.
     *
     * @param array $data data
     *
     * @return Transaction
     *
     * @throws EntityNotFoundException
     */
    public function findOneBy(array $data): Transaction;

    /**
     * UpdateProviderId.
     *
     * @param int    $id         id
     * @param string $providerId providerId
     *
     * @return Transaction
     *
     * @throws EntityAlReadyExistException
     *
     * @SuppressWarnings(PHPMD.ShortVariable)
     */
    public function updateProviderId(int $id, string $providerId): Transaction;

    /**
     * UpdateStatus.
     *
     * @param int    $id     id
     * @param Status $status status
     *
     * @throws EntityNotFoundException
     *
     * @SuppressWarnings(PHPMD.ShortVariable)
     *
     * @return Transaction
     */
    public function updateStatus(int $id, Status $status): Transaction;

    /**
     * UpdateProviderIdStatus.
     *
     * @param int    $id         id
     * @param string $providerId providerId
     * @param Status $status     status
     *
     * @return Transaction
     *
     * @throws EntityNotFoundException
     *
     * @SuppressWarnings(PHPMD.ShortVariable)
     */
    public function updateProviderIdStatus(
        int $id,
        string $providerId,
        Status $status
    ): Transaction;

    /**
     * UpdateProviderData.
     *
     * @param int         $id          id
     * @param Transaction $transaction transaction
     *
     * @return Transaction
     *
     * @throws EntityAlReadyExistException
     *
     * @SuppressWarnings(PHPMD.ShortVariable)
     */
    public function updateProviderData(
        int $id,
        Transaction $transaction
    ): Transaction;

    /**
     * Update.
     *
     * @param Transaction $transaction transaction
     *
     * @return Transaction
     *
     * @throws \Exception
     */
    public function update(Transaction $transaction): Transaction;
}
