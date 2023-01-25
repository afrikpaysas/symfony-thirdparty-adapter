<?php

/**
 * PHP Version 8.1
 * OptionRequestMapper.
 *
 * @category Mapper
 * @package  App\Mapper
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Mapper/OptionRequestMapper.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace App\Mapper;

use App\Entity\Option;
use Lib\Dto\OptionRequest;
use Lib\Mapper\OptionRequestMapper as BaseOptionRequestMapper;
use Lib\Model\OptionCollection;
use Lib\Model\OptionRequestCollection;

/**
 * OptionRequestMapper.
 *
 * @category Mapper
 * @package  App\Mapper
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Mapper/OptionRequestMapper.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 *
 * @codingStandardsIgnoreStart
 * @template-extends    Mapper<OptionRequest, Option, OptionRequestCollection, OptionCollection>
 * @codingStandardsIgnoreEnd
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class OptionRequestMapper extends Mapper implements BaseOptionRequestMapper
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
        string $dtoClass = OptionRequest::class,
        string $entitiesClass = OptionCollection::class,
        string $dtosClass = OptionRequestCollection::class
    ) {
        $this->entityClass = $entityClass;
        $this->dtoClass = $dtoClass;
        $this->entitiesClass = $entitiesClass;
        $this->dtosClass = $dtosClass;
    }
}
