<?php

/**
 * PHP Version 8.1
 * TransactionMapper.
 *
 * @category Mapper
 * @package  Afrikpaysas\Lib\Mapper
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Mapper/TransactionMapper.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Lib\Mapper;

use Afrikpaysas\Lib\Entity\Transaction;
use Afrikpaysas\Lib\Dto\TransactionDTO as TransactionDTO;
use Afrikpaysas\Lib\Model\TransactionCollection;
use Afrikpaysas\Lib\Model\TransactionDTOCollection;

/**
 * TransactionMapper.
 *
 * @codingStandardsIgnoreStart
 * @template-extends BaseEntityMapper<TransactionDTO, Transaction, TransactionDTOCollection, TransactionCollection>
 * @codingStandardsIgnoreEnd
 *
 * @category Mapper
 * @package  Afrikpaysas\Lib\Mapper
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Mapper/TransactionMapper.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
interface TransactionMapper extends BaseEntityMapper
{
}
