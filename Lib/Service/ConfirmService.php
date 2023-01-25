<?php

/**
 * PHP Version 8.1
 * ConfirmService.
 *
 * @category Service
 * @package  Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Service/ConfirmService.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Service;

use Lib\Dto\ConfirmRequest;
use Lib\Entity\Transaction;
use Lib\Exception\IllegalStatusConfirmException;
use Lib\Exception\RequiredProviderIdException;

/**
 * ConfirmService.
 *
 * @category Service
 * @package  Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Service/ConfirmService.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
interface ConfirmService
{
    /**
     * Confirm
     *
     * @param ConfirmRequest $request request
     *
     * @return Transaction
     *
     * @throws IllegalStatusConfirmException|RequiredProviderIdException
     */
    public function confirm(ConfirmRequest $request): Transaction;
}
