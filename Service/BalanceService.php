<?php

/**
 * PHP Version 8.1
 * BalanceService
 *
 * @category Service
 * @package  Afrikpaysas\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Service/BalanceService.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Service;

use Afrikpaysas\Lib\Exception\BalanceApplicationException;
use Afrikpaysas\Lib\Model\AppConstants;
use Afrikpaysas\Lib\Service\BalanceService as BaseBalanceService;
use Afrikpaysas\Lib\Service\ParameterService;

/**
 * BalanceService.
 *
 * @category Service
 * @package  Afrikpaysas\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Service/BalanceService.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
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
