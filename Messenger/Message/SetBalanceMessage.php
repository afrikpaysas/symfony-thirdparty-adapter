<?php

/**
 * PHP Version 8.1
 * SetBalanceMessage.
 *
 * @category Message
 * @package  Afrikpaysas\SymfonyThirdpartyAdapter\Messenger\Message
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Messenger/Message/SetBalanceMessage.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */

namespace Afrikpaysas\SymfonyThirdpartyAdapter\Messenger\Message;

use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Dto\TransactionDTO;

/**
 * SetBalanceMessage.
 *
 * @category Message
 * @package  Afrikpaysas\SymfonyThirdpartyAdapter\Messenger\Message
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Messenger/Message/SetBalanceMessage.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
class SetBalanceMessage extends TransactionDTO
{
    /**
     * Constructor.
     *
     * @param TransactionDTO $transaction transaction
     *
     * return void
     */
    public function __construct(TransactionDTO $transaction)
    {
        foreach (get_object_vars($transaction) as $key => $value) {
            if (null != $value) {
                $this->$key = $value;
            }
        }
    }
}
