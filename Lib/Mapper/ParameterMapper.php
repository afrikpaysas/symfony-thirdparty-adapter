<?php

/**
 * PHP Version 8.1
 * ParameterMapper.
 *
 * @category Mapper
 * @package  Lib\Mapper
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Mapper/ParameterMapper.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Mapper;

use Lib\Dto\ParameterDTO;
use Lib\Entity\Parameter;
use Lib\Model\ParameterCollection;
use Lib\Model\ParameterDTOCollection;

/**
 * ParameterMapper.
 *
 * @codingStandardsIgnoreStart
 * @template-extends BaseEntityMapper<ParameterDTO, Parameter, ParameterDTOCollection, ParameterCollection>
 * @codingStandardsIgnoreEnd
 *
 * @category Mapper
 * @package  Lib\Mapper
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Mapper/ParameterMapper.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
interface ParameterMapper extends BaseEntityMapper
{
}
