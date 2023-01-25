<?php

/**
 * PHP Version 8.1
 * ReferenceMapper.
 *
 * @category Mapper
 * @package  Afrikpaysas\Mapper
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Mapper/ReferenceMapper.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Mapper;

use Afrikpaysas\Entity\Transaction;
use Afrikpaysas\Lib\Dto\TransactionDTO;
use Afrikpaysas\Lib\Mapper\TransactionMapper as BaseTransactionMapper;
use Afrikpaysas\Lib\Model\TransactionCollection;
use Afrikpaysas\Lib\Model\TransactionDTOCollection;

/**
 * TransactionMapper.
 *
 * @category Mapper
 * @package  Afrikpaysas\Mapper
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Mapper/ReferenceMapper.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 *
 * @codingStandardsIgnoreStart
 * @template-extends    BaseEntityMapper<TransactionDTO, Transaction, TransactionDTOCollection, Transaction>
 * @codingStandardsIgnoreEnd
 */
class TransactionMapper extends BaseEntityMapper implements BaseTransactionMapper
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
        string $entityClass = Transaction::class,
        string $dtoClass = TransactionDTO::class,
        string $entitiesClass = TransactionCollection::class,
        string $dtosClass = TransactionDTOCollection::class
    ) {
        parent::__construct($entityClass, $dtoClass, $entitiesClass, $dtosClass);
    }
}
