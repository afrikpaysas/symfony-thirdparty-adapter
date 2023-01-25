<?php

/**
 * PHP Version 8.1
 * ErrorController.
 *
 * @category Controller
 * @package  Lib\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Controller/ErrorController.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Controller;

use Lib\Dto\ErrorResponse;
use Symfony\Component\HttpKernel\Log\DebugLoggerInterface;

/**
 * ErrorController.
 *
 * @category Controller
 * @package  Lib\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Controller/ErrorController.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
interface ErrorController
{
    /**
     * Error API.
     *
     * @param \Throwable                $exception exception
     * @param DebugLoggerInterface|null $logger    logger
     *
     * @return ErrorResponse
     *
     * @throws \Throwable
     */
    public function error(
        \Throwable $exception,
        ?DebugLoggerInterface $logger = null
    ): ErrorResponse;
}
