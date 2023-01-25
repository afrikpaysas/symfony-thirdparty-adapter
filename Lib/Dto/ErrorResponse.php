<?php

/**
 * PHP Version 8.1
 * ErrorResponse.
 *
 * @category Dto
 * @package  Lib\Dto
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Dto/ErrorResponse.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Dto;

use Lib\Model\BasicResponse as ModelBasicResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * ErrorResponse.
 *
 * @category Dto
 * @package  Lib\Dto
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Dto/ErrorResponse.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class ErrorResponse extends JsonResponse
{
    /**
     * Constructor.
     *
     * @param int    $code    code
     * @param string $message message
     *
     * @return void
     *
     * @psalm-suppress PossiblyInvalidArgument
     */
    public function __construct(int $code, string $message)
    {
        $response = new ModelBasicResponse();

        $response->code = $code;
        $response->message = $message;
        $response->result = null;

        parent::__construct($response);
    }
}
