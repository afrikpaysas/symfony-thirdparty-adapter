<?php

/**
 * PHP Version 8.1
 * BaseEntityMapper.
 *
 * @category Mapper
 * @package  Lib\Mapper
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Mapper/BaseEntityMapper.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Mapper;

/**
 * BaseEntityMapper.
 *
 * @template T of object
 * @template K of object
 * @template Z of object
 * @template S of object
 *
 * @template-extends Mapper<T, K, Z, S>
 *
 * @category Mapper
 * @package  Lib\Mapper
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Mapper/BaseEntityMapper.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
interface BaseEntityMapper extends Mapper
{
}
