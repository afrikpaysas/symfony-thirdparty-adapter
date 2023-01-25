<?php

/**
 * PHP Version 8.1
 * ParameterRepository.
 *
 * @category Model
 * @package  Lib\Model
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Model/ParameterRepository.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Repository;

use Lib\Entity\Parameter;
use Lib\Exception\EntityNotFoundException;

/**
 * ParameterRepository.
 *
 * @template T of object
 *
 * @template-extends ServiceEntityRepositoryInterface<Parameter>
 *
 * @category Model
 * @package  Lib\Model
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Model/ParameterRepository.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
interface ParameterRepository extends ServiceEntityRepositoryInterface
{
    /**
     * FindOneBySlug.
     *
     * @param string $slug  slug
     * @param bool   $throw throw
     *
     * @return Parameter|null
     *
     * @throws EntityNotFoundException
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function findOneBySlug(string $slug, bool $throw = true): ?Parameter;

    /**
     * FindOneByParameterId.
     *
     * @param int  $parameterId parameterId
     * @param bool $throw       throw
     *
     * @return Parameter|null
     *
     * @throws EntityNotFoundException
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function findOneByParameterId(
        int $parameterId,
        bool $throw = true
    ): ?Parameter;

    /**
     * FindOneByParameterId.
     *
     * @param string $slug  slug
     * @param string $value value
     *
     * @return Parameter
     *
     * @throws \Exception
     */
    public function updateValue(string $slug, string $value): Parameter;
}
