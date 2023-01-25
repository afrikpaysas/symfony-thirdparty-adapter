<?php

/**
 * PHP Version 8.1
 * VerifyController.
 *
 * @category Controller
 * @package  Afrikpaysas\Lib\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Controller/VerifyController.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Lib\Controller;

use Afrikpaysas\Lib\Dto\VerifyRequest;
use Afrikpaysas\Lib\Dto\VerifyResponse;
use Afrikpaysas\Lib\Exception\VerifyException;

/**
 * VerifyController.
 *
 * @category Controller
 * @package  Afrikpaysas\Lib\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Controller/VerifyController.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
interface VerifyController
{
    /**
     * Verify API.
     *
     * @param VerifyRequest $request request
     *
     * @return VerifyResponse
     *
     * @throws VerifyException
     */
    public function verify(VerifyRequest $request): VerifyResponse;
}
