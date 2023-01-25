<?php

/**
 * PHP Version 8.1
 * ParameterRepository.
 *
 * @category Repository
 * @package  App\Repository
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Repository/OptionRepository.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace App\Repository;

use App\Entity\Parameter;
use Doctrine\Persistence\ManagerRegistry;
use Lib\Exception\EntityNotFoundException;
use Lib\Model\AppConstants;
use Lib\Model\ParameterCollection;
use Lib\Repository\ParameterRepository as BaseParameterRepository;

/**
 * ParameterRepository.
 *
 * @template-extends    Repository<Parameter>
 * @template-implements BaseParameterRepository
 *
 * @category Repository
 * @package  App\Repository
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Repository/OptionRepository.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
class ParameterRepository extends Repository implements BaseParameterRepository
{
    /**
     * Constructor.
     *
     * @param ManagerRegistry $registry registry
     *
     * @return void
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Parameter::class, ParameterCollection::class);
    }

    /**
     * FindOneByParameterId.
     *
     * @param int  $parameterId parameterId
     * @param bool $throw       throw
     *
     * @return Parameter|null
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     *
     * @throws EntityNotFoundException
     */
    public function findOneByParameterId(
        int $parameterId,
        bool $throw = true
    ): ?Parameter {
        return parent::findOneWith(
            [AppConstants::PARAMETER_ID => $parameterId],
            $throw
        );
    }

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
    public function findOneBySlug(
        string $slug,
        bool $throw = true
    ): ?Parameter {
        return parent::findOneWith([AppConstants::SLUG => $slug], $throw);
    }

    /**
     * UpdateValue.
     *
     * @param string $slug  slug
     * @param bool   $value value
     *
     * @return Parameter
     *
     * @throws EntityNotFoundException
     */
    public function updateValue(string $slug, string $value): Parameter
    {
        return parent::updateWith(
            AppConstants::SLUG,
            $slug,
            AppConstants::SLUG,
            $value
        );
    }
}
