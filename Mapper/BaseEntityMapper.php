<?php

/**
 * PHP Version 8.1
 * BaseEntityMapper.
 *
 * @category Mapper
 * @package  App\Mapper
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Mapper/BaseEntityMapper.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace App\Mapper;

use Lib\Mapper\BaseEntityMapper as BaseBaseEntityMapper;
use Lib\Model\AppConstants;

/**
 * BaseEntityMapper.
 *
 * @category Mapper
 * @package  App\Mapper
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Mapper/BaseEntityMapper.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 *
 * @template T of object
 * @template K of object
 * @template Z of object
 * @template S of object
 *
 * @template-extends    Mapper<T, K, Z, S>
 * @template-implements BaseBaseEntityMapper<T, K, Z, S>
 */
class BaseEntityMapper extends Mapper implements BaseBaseEntityMapper
{
    /**
     * Constructor.
     *
     * @param string $entityClass   entityClass
     * @param string $dtoClass      dtoClass
     * @param string $entitiesClass entitiesClass
     * @param string $dtosClass     dtosClass
     *
     * @return void
     */
    public function __construct(
        string $entityClass = null,
        string $dtoClass = null,
        string $entitiesClass = null,
        string $dtosClass = null
    ) {
        parent::__construct(
            $entityClass,
            $dtoClass,
            $entitiesClass,
            $dtosClass,
            AppConstants::DEFAULT_KEY_DTO_CONVERTER
        );
    }
}
