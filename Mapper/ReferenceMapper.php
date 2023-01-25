<?php

/**
 * PHP Version 8.1
 * ReferenceMapper.
 *
 * @category Mapper
 * @package  App\Mapper
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Mapper/ReferenceMapper.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace App\Mapper;

use App\Entity\Reference;
use Lib\Dto\ReferenceDTO;
use Lib\Mapper\ReferenceMapper as BaseReferenceMapper;
use Lib\Model\ReferenceCollection;
use Lib\Model\ReferenceDTOCollection;

/**
 * ReferenceMapper.
 *
 * @category Mapper
 * @package  App\Mapper
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Mapper/ReferenceApiResponseMapper.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 *
 * @codingStandardsIgnoreStart
 * @template-extends BaseEntityMapper<ReferenceDTO, Reference, ReferenceDTOCollection, ReferenceCollection>
 * @codingStandardsIgnoreEnd
 */
class ReferenceMapper extends BaseEntityMapper implements BaseReferenceMapper
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
        string $entityClass = Reference::class,
        string $dtoClass = ReferenceDTO::class,
        string $entitiesClass = ReferenceCollection::class,
        string $dtosClass = ReferenceDTOCollection::class
    ) {
        parent::__construct($entityClass, $dtoClass, $entitiesClass, $dtosClass);
    }
}
