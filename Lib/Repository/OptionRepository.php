<?php

/**
 * PHP Version 8.1
 * OptionRepository.
 *
 * @category Model
 * @package  Lib\Model
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Model/OptionRepository.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Repository;

use Lib\Entity\Option;
use Lib\Model\OptionCollection;

/**
 * OptionRepository.
 *
 * @template T of object
 *
 * @template-extends ServiceEntityRepositoryInterface<Option>
 *
 * @category Model
 * @package  Lib\Model
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Model/OptionRepository.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
interface OptionRepository extends ServiceEntityRepositoryInterface
{
    /**
     * FindOneByOptionId.
     *
     * @param int  $optionId optionId
     * @param bool $throw    throw
     *
     * @return Option|null
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function findOneByOptionId(int $optionId, bool $throw = true): ?Option;

    /**
     * FindOneBySlug.
     *
     * @param string $slug  slug
     * @param bool   $throw throw
     *
     * @return Option|null
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function findOneBySlug(string $slug, bool $throw = true): ?Option;

    /**
     * FindByReference.
     *
     * @param string $reference reference
     * @param bool   $throw     throw
     *
     * @return OptionCollection|null
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function findByReference(
        string $reference,
        bool $throw = true
    ): ?OptionCollection;

    /**
     * FindAllByReference.
     *
     * @param string|null $reference reference
     *
     * @return array
     */
    public function findAllByReference(?string $reference = null): array;

    /**
     * FindOneByReferenceAndSlug.
     *
     * @param string $reference reference
     * @param string $slug      slug
     * @param bool   $throw     throw
     *
     * @return Option|null
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function findOneByReferenceAndSlug(
        string $reference,
        string $slug,
        bool $throw = true
    ): ?Option;
}
