<?php

/**
 * PHP Version 8.1
 * OptionMapper.
 *
 * @category Mapper
 * @package  Lib\Mapper
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Mapper/OptionMapper.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Mapper;

use Lib\Dto\OptionDTO;
use Lib\Entity\Option;
use Lib\Model\OptionCollection;
use Lib\Model\OptionDTOCollection;

/**
 * OptionMapper.
 *
 * @codingStandardsIgnoreStart
 * @template-extends BaseEntityMapper<OptionDTO, Option, OptionDTOCollection, OptionCollection>
 * @codingStandardsIgnoreEnd
 *
 * @category Mapper
 * @package  Lib\Mapper
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Mapper/OptionMapper.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
interface OptionMapper extends BaseEntityMapper
{
}
