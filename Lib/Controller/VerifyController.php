<?php

/**
 * PHP Version 8.1
 * VerifyController.
 *
 * @category Controller
 * @package  Lib\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Controller/VerifyController.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Controller;

use Lib\Dto\VerifyRequest;
use Lib\Dto\VerifyResponse;
use Lib\Exception\VerifyException;

/**
 * VerifyController.
 *
 * @category Controller
 * @package  Lib\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Controller/VerifyController.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
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
