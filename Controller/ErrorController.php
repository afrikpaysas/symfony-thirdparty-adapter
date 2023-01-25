<?php

/**
 * PHP Version 8.1
 * ErrorController.
 *
 * @category Controller
 * @package  App\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Controller/ErrorController.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace App\Controller;

use Doctrine\DBAL\Exception\ConnectionException;
use FOS\RestBundle\Controller\Annotations\Route;
use Lib\Controller\ErrorController as BaseErrorController;
use Lib\Dto\ErrorResponse;
use Lib\Exception\GeneralException;
use Lib\Model\AppConstants;
use Lib\Model\SystemExceptionMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Log\DebugLoggerInterface;

/**
 * ErrorController.
 *
 * @category Controller
 * @package  App\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Controller/ErrorController.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
#[Route('/error')]
class ErrorController extends AbstractController implements BaseErrorController
{
    /**
     * Error.
     *
     * @param \Throwable                $exception exception
     * @param DebugLoggerInterface|null $logger    logger
     *
     * @return ErrorResponse
     *
     * @throws \Throwable
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     * @SuppressWarnings(PHPMD.ElseExpression)
     *
     * @psalm-suppress PossiblyUndefinedArrayOffset
     */
    #[Route]
    public function error(
        \Throwable $exception,
        ?DebugLoggerInterface $logger = null
    ): ErrorResponse {
        $code = $message = null;

        if ($exception instanceof GeneralException) {
            $code = $exception->getCode();
            $message = $exception->getMessage();
        } elseif ($exception instanceof ConnectionException) {
            $code = SystemExceptionMessage::DATABASE_CONNECTIVITY_FAILURE[
                AppConstants::CODE
            ];
            $message = sprintf(
                SystemExceptionMessage::DATABASE_CONNECTIVITY_FAILURE[
                    AppConstants::MESSAGE
                ]
            );
        } elseif ($exception instanceof NotFoundHttpException) {
            $code = SystemExceptionMessage::URI_NOT_FOUND[AppConstants::CODE];
            $message = $exception->getMessage();
        } else {
            if (AppConstants::ENV_DEV == $_ENV['APP_ENV']) {
                throw $exception;
            }
            $code = SystemExceptionMessage::GENERAL_FAILURE[AppConstants::CODE];
            $messageTxt = SystemExceptionMessage::GENERAL_FAILURE[
                AppConstants::MESSAGE
            ];
            $separator = AppConstants::SEPARATOR_MESSAGE;
            $tryAgain = AppConstants::SEPARATOR_MESSAGE;
            $message = sprintf($messageTxt, "$separator $tryAgain");
        }

        return new ErrorResponse((int)$code, $message);
    }
}
