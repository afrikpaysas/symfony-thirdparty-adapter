<?php

/**
 * PHP Version 8.1
 * BalanceService
 *
 * @category Service
 * @package  App\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Service/BalanceService.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace App\Service;

use Lib\Exception\BalanceApplicationException;
use Lib\Model\AppConstants;
use Lib\Service\BalanceService as BaseBalanceService;
use Lib\Service\ParameterService;

/**
 * BalanceService.
 *
 * @category Service
 * @package  App\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Service/BalanceService.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
class BalanceService implements BaseBalanceService
{
    protected ParameterService $parameterService;

    /**
     * Constructor.
     *
     * @param ParameterService $parameterService parameterService
     *
     * @return void
     */
    public function __construct(ParameterService $parameterService)
    {
        $this->parameterService = $parameterService;
    }

    /**
     * Balance.
     *
     * @return float
     *
     * @throws BalanceApplicationException
     *
     * @psalm-suppress PossiblyNullPropertyFetch
     */
    public function balance(): float
    {
        $balanceParam = $this->parameterService->getParameter(AppConstants::BALANCE);

        return floatval($balanceParam->value);
    }

    /**
     * SetBalance.
     *
     * @param float $balance balance
     *
     * @return void
     *
     * @throws BalanceApplicationException|\Exception
     */
    public function setBalance(float $balance): void
    {
        $this->parameterService->setParameter(
            AppConstants::BALANCE,
            (string)$balance
        );
    }
}
