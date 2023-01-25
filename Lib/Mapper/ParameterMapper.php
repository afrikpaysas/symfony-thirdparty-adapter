<?php

/**
 * PHP Version 8.1
 * ParameterMapper.
 *
 * @category Mapper
 * @package  Afrikpaysas\Lib\Mapper
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Mapper/ParameterMapper.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Lib\Mapper;

use Afrikpaysas\Lib\Dto\ParameterDTO;
use Afrikpaysas\Lib\Entity\Parameter;
use Afrikpaysas\Lib\Model\ParameterCollection;
use Afrikpaysas\Lib\Model\ParameterDTOCollection;

/**
 * ParameterMapper.
 *
 * @codingStandardsIgnoreStart
 * @template-extends BaseEntityMapper<ParameterDTO, Parameter, ParameterDTOCollection, ParameterCollection>
 * @codingStandardsIgnoreEnd
 *
 * @category Mapper
 * @package  Afrikpaysas\Lib\Mapper
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Mapper/ParameterMapper.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
interface ParameterMapper extends BaseEntityMapper
{
}
