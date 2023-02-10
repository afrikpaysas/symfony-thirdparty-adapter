<?php

/**
 * PHP Version 8.1
 * UpdateProviderIdMessage.
 *
 * @category Message
 * @package  Afrikpaysas\SymfonyThirdpartyAdapter\Messenger\Message
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Messenger/Message/UpdateProviderIdMessage.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */

namespace Afrikpaysas\SymfonyThirdpartyAdapter\Messenger\Message;

use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Dto\FullTransactionDTO;

/**
 * UpdateProviderIdMessage.
 *
 * @category Message
 * @package  Afrikpaysas\SymfonyThirdpartyAdapter\Messenger\Message
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Messenger/Message/UpdateProviderIdMessage.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
class UpdateProviderIdMessage extends FullTransactionDTO
{
    /**
     * Constructor.
     *
     * @param FullTransactionDTO $transaction transaction
     *
     * return void
     */
    public function __construct(FullTransactionDTO $transaction)
    {
        foreach (get_object_vars($transaction) as $key => $value) {
            if (null != $value) {
                $this->$key = $value;
            }
        }
    }
}
