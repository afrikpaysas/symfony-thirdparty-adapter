<?php

/**
 * PHP Version 8.1
 * StatusService.
 *
 * @category Service
 * @package  App\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Service/StatusService.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace App\Service;

use Lib\Entity\Transaction;
use Lib\Dto\StatusRequest;
use Lib\Exception\BadReferenceException;
use Lib\Exception\InvalidAmountException;
use Lib\Mapper\ReferenceMapper;
use Lib\Mapper\TransactionMapper;
use Lib\Service\ReferenceService;
use Lib\Service\StatusService as BaseStatusService;
use Lib\Service\TransactionService;

/**
 * StatusService.
 *
 * @category Service
 * @package  App\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Service/StatusService.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
class StatusService implements BaseStatusService
{
    protected TransactionService $transactionService;
    protected ReferenceService $referenceService;
    protected ReferenceMapper $referenceMapper;
    protected TransactionMapper $transactionMapper;

    /**
     * Constructor.
     *
     * @param TransactionService $transactionService transactionService
     * @param ReferenceService   $referenceService   referenceService
     * @param ReferenceMapper    $referenceMapper    referenceMapper
     * @param TransactionMapper  $transactionMapper  transactionMapper
     *
     * @return void
     */
    public function __construct(
        TransactionService $transactionService,
        ReferenceService $referenceService,
        ReferenceMapper $referenceMapper,
        TransactionMapper $transactionMapper
    ) {
        $this->transactionService = $transactionService;
        $this->referenceService = $referenceService;
        $this->referenceMapper = $referenceMapper;
        $this->transactionMapper = $transactionMapper;
    }

    /**
     * Status.
     *
     * @param StatusRequest $request request
     *
     * @return Transaction
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     *
     * @psalm-suppress MixedAssignment
     */
    public function status(StatusRequest $request): Transaction
    {
        if (!preg_match($_ENV['REFERENCE_REGEX'], $request->reference ?? '')) {
            throw new BadReferenceException($request->reference);
        }

        $condition = $request->amount &&
            (
                $request->amount > $_ENV['AMOUNT_MAX'] ||
                $request->amount < $_ENV['AMOUNT_MIN']
            );

        if ($condition) {
            throw new InvalidAmountException($request->amount);
        }

        $searchItems = [];

        foreach (get_object_vars($request) as $key => $value) {
            if ($value) {
                $searchItems[$key] = $value;
            }
        }

        $transaction = $this->transactionService->findOneBy($searchItems);

        if ($_ENV['REFERENCE_API_ENABLED']) {
            $transaction->referenceData = $this->referenceService
                ->findByReferenceNumber(
                    $transaction->reference
                );
        }

        return $transaction;
    }
}
