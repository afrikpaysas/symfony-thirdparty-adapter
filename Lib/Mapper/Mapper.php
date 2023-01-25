<?php

/**
 * PHP Version 8.1
 * Mapper.
 *
 * @category Mapper
 * @package  Lib\Mapper
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Mapper/Mapper.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Mapper;

use Lib\Model\Collection;
use Lib\Model\Status;

/**
 * Mapper.
 *
 * @template T of object
 * @template K of object
 * @template Z of object
 * @template S of object
 *
 * @category Mapper
 * @package  Lib\Mapper
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Mapper/Mapper.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
interface Mapper
{
    /**
     * Get entity with Dto.
     *
     * @param T|null $dto dto
     *
     * @return K|null
     */
    public function asEntity($dto);

    /**
     * Get Dto with entity.
     *
     * @param K|null $entity entity
     *
     * @return T|null
     */
    public function asDTO($entity);

    /**
     * Get entities with dtos.
     *
     * @param Z|Collection<T>|null $dtos dtos
     *
     * @return S|Collection<K>|null
     */
    public function asEntityList($dtos);

    /**
     * Get dtos with entities.
     *
     * @param S|Collection<K>|null $entities entities
     *
     * @return Z|Collection<T>|null
     */
    public function asDTOList($entities);

    /**
     * ConvertToValue.
     * Convert entity attribute to dto value.
     *
     * @param string|int|float|\DateTime|Status|null $attribute attribute
     *
     * @return string|int|float|null
     */
    public function convertToValue(
        string|int|float|\DateTime|Status|null $attribute
    ): string|int|float|null;

    /**
     * ConvertToAttribute.
     * Convert dto value to entity attribute.
     *
     * @param string|int|float|null $value value
     * @param string|null           $class class
     *
     * @return string|int|float|\DateTime|Status|null
     */
    public function convertToAttribute(
        string|int|float|null $value,
        ?string $class = null
    ): string|int|float|\DateTime|Status|null;
}
