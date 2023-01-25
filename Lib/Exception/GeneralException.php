<?php

/**
 * PHP Version 8.1
 * GeneralException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/GeneralException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Exception;

use Lib\Model\AppConstants;

/**
 * GeneralException.
 *
 * @category Exception
 * @package  Lib\Exception
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Exception/GeneralException.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 *
 * @SuppressWarnings(PHPMD.NumberOfChildren)
 */
class GeneralException extends \RuntimeException implements \Throwable
{
    /**
     * Constructor.
     *
     * @param array       $exceptionDetail exceptionDetail
     * @param string|null $message         message
     * @param int|null    $code            code
     */
    public function __construct(
        array $exceptionDetail,
        string $message = null,
        int $code = null
    ) {
        $messageException = (string) (
            $message ?? $exceptionDetail[AppConstants::MESSAGE]
        );
        $codeException = (int) (
            $code ?? $exceptionDetail[AppConstants::CODE]
        );

        parent::__construct($messageException, $codeException);
    }

    /**
     * SetMessage.
     *
     * @param string $message message
     *
     * @return void
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }
}
