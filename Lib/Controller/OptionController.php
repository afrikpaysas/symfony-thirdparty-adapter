<?php

/**
 * PHP Version 8.1
 * OptionController.
 *
 * @category Controller
 * @package  Afrikpaysas\Lib\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Controller/OptionController.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Lib\Controller;

use Afrikpaysas\Lib\Dto\OptionListResponse;
use Afrikpaysas\Lib\Dto\OptionRequest;
use Afrikpaysas\Lib\Dto\OptionResponse;
use Afrikpaysas\Lib\Exception\OptionException;
use Afrikpaysas\Lib\Exception\VerifyException;

/**
 * OptionController.
 *
 * @category Controller
 * @package  Afrikpaysas\Lib\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Controller/OptionController.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
interface OptionController
{
    /**
     * Create API.
     *
     * @param OptionRequest $request request
     *
     * @return OptionResponse
     *
     * @throws VerifyException|OptionException
     */
    public function create(OptionRequest $request): OptionResponse;

    /**
     * List API.
     *
     * @return OptionListResponse
     *
     * @throws VerifyException|OptionException
     */
    public function list(): OptionListResponse;
}
