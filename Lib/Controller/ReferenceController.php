<?php

/**
 * PHP Version 8.1
 * ReferenceController.
 *
 * @category Controller
 * @package  Afrikpaysas\Lib\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Controller/ReferenceController.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Lib\Controller;

use Afrikpaysas\Lib\Dto\OptionListResponse;
use Afrikpaysas\Lib\Dto\ReferenceResponse;
use Afrikpaysas\Lib\Exception\PaymentException;
use Afrikpaysas\Lib\Exception\ReferenceException;
use Afrikpaysas\Lib\Exception\VerifyException;

/**
 * ReferenceController.
 *
 * @category Controller
 * @package  Afrikpaysas\Lib\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Controller/ReferenceController.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
interface ReferenceController
{
    /**
     * ListReference API.
     *
     * @param string $reference reference
     *
     * @return OptionListResponse
     *
     * @throws VerifyException|ReferenceException
     */
    public function listReference(string $reference): OptionListResponse;

    /**
     * Reference API.
     *
     * @param string $reference reference
     *
     * @return ReferenceResponse
     *
     * @throws VerifyException|PaymentException
     */
    public function reference(string $reference): ReferenceResponse;
}
