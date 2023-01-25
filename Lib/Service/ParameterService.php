<?php

/**
 * PHP Version 8.1
 * ParameterService.
 *
 * @category Service
 * @package  Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Service/ParameterService.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Service;

use Lib\Entity\Parameter;
use Lib\Exception\ParameterEnvNotFoundException;
use Lib\Exception\ParameterNotFoundException;

/**
 * ParameterService.
 *
 * @category Service
 * @package  Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Service/ParameterService.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
interface ParameterService
{
    /**
     * Get.
     *
     * @param string $key   key
     * @param bool   $throw throw
     *
     * @return string|null
     *
     * @throws ParameterNotFoundException
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function get(string $key, bool $throw = true): ?string;

    /**
     * GetEnv.
     *
     * @param string $key   key
     * @param bool   $throw throw
     *
     * @return array|bool|string|int|float|\UnitEnum|null
     *
     * @throws ParameterNotFoundException
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function getEnv(
        string $key,
        bool $throw = true
    ): array|bool|string|int|float|\UnitEnum|null;

    /**
     * GetParameter.
     *
     * @param string $key   key
     * @param bool   $throw throw
     *
     * @return Parameter|null
     *
     * @throws ParameterNotFoundException
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function getParameter(string $key, bool $throw = true): ?Parameter;

    /**
     * SetParameter.
     *
     * @param string $key   key
     * @param string $value value
     *
     * @return void
     *
     * @throws \Exception
     */
    public function setParameter(string $key, string $value): void;
}
