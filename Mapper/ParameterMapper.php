<?php

/**
 * PHP Version 8.1
 * ParameterMapper.
 *
 * @category Mapper
 * @package  Afrikpaysas\Mapper
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Mapper/ParameterMapper.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Mapper;

use Afrikpaysas\Entity\Parameter;
use Afrikpaysas\Lib\Dto\ParameterDTO;
use Afrikpaysas\Lib\Mapper\ParameterMapper as BaseParameterMapper;
use Afrikpaysas\Lib\Model\ParameterCollection;
use Afrikpaysas\Lib\Model\ParameterDTOCollection;

/**
 * ParameterMapper.
 *
 * @category Mapper
 * @package  Afrikpaysas\Mapper
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Mapper/ParameterMapper.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 *
 * @codingStandardsIgnoreStart
 * @template-extends BaseEntityMapper<ParameterDTO, Parameter, ParameterDTOCollection, ParameterCollection>
 * @codingStandardsIgnoreEnd
 */
class ParameterMapper extends BaseEntityMapper implements BaseParameterMapper
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
        string $entityClass = Parameter::class,
        string $dtoClass = ParameterDTO::class,
        string $entitiesClass = ParameterCollection::class,
        string $dtosClass = ParameterDTOCollection::class
    ) {
        parent::__construct($entityClass, $dtoClass, $entitiesClass, $dtosClass);
    }
}
