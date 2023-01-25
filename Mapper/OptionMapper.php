<?php

/**
 * PHP Version 8.1
 * OptionMapper.
 *
 * @category Mapper
 * @package  App\Mapper
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Mapper/OptionMapper.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace App\Mapper;

use App\Entity\Option;
use Lib\Dto\OptionDTO;
use Lib\Mapper\OptionMapper as BaseOptionMapper;
use Lib\Model\OptionCollection;
use Lib\Model\OptionDTOCollection;

/**
 * OptionMapper.
 *
 * @category Mapper
 * @package  App\Mapper
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Mapper/OptionMapper.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 *
 * @codingStandardsIgnoreStart
 * @template-extends BaseEntityMapper<OptionDTO, Option, OptionDTOCollection, OptionCollection>
 * @codingStandardsIgnoreEnd
 */
class OptionMapper extends BaseEntityMapper implements BaseOptionMapper
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
        string $entityClass = Option::class,
        string $dtoClass = OptionDTO::class,
        string $entitiesClass = OptionCollection::class,
        string $dtosClass = OptionDTOCollection::class
    ) {
        parent::__construct(
            $entityClass,
            $dtoClass,
            $entitiesClass,
            $dtosClass
        );
    }
}
