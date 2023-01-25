<?php

/**
 * PHP Version 8.1
 * TransactionMapper.
 *
 * @category Mapper
 * @package  Lib\Mapper
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Mapper/TransactionMapper.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Mapper;

use Lib\Entity\Transaction;
use Lib\Dto\TransactionDTO as TransactionDTO;
use Lib\Model\TransactionCollection;
use Lib\Model\TransactionDTOCollection;

/**
 * TransactionMapper.
 *
 * @codingStandardsIgnoreStart
 * @template-extends BaseEntityMapper<TransactionDTO, Transaction, TransactionDTOCollection, TransactionCollection>
 * @codingStandardsIgnoreEnd
 *
 * @category Mapper
 * @package  Lib\Mapper
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Mapper/TransactionMapper.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
interface TransactionMapper extends BaseEntityMapper
{
}
