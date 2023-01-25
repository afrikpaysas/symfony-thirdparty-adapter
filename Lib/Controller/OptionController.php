<?php

/**
 * PHP Version 8.1
 * OptionController.
 *
 * @category Controller
 * @package  Lib\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Controller/OptionController.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Controller;

use Lib\Dto\OptionListResponse;
use Lib\Dto\OptionRequest;
use Lib\Dto\OptionResponse;
use Lib\Exception\OptionException;
use Lib\Exception\VerifyException;

/**
 * OptionController.
 *
 * @category Controller
 * @package  Lib\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Controller/OptionController.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
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
