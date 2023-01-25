<?php

/**
 * PHP Version 8.1
 * ReferenceMapper.
 *
 * @category Mapper
 * @package  Lib\Mapper
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Mapper/ReferenceMapper.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Mapper;

use Lib\Entity\Reference;
use Lib\Dto\ReferenceDTO;
use Lib\Model\ReferenceDTOCollection;

/**
 * ReferenceMapper.
 *
 * @codingStandardsIgnoreStart
 * @template-extends BaseEntityMapper<ReferenceDTO, Reference, ReferenceDTOCollection, Reference>
 * @codingStandardsIgnoreEnd
 *
 * @category Mapper
 * @package  Lib\Mapper
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Mapper/ReferenceMapper.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
interface ReferenceMapper extends BaseEntityMapper
{
}
