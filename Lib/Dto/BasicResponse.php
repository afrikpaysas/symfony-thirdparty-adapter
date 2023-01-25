<?php

/**
 * PHP Version 8.1
 * BasicResponse.
 *
 * @category Dto
 * @package  Afrikpaysas\Lib\Dto
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Dto/BasicResponse.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Lib\Dto;

use Afrikpaysas\Lib\Model\AppConstants;
use Afrikpaysas\Lib\Model\BasicResponse as ModelBasicResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * BasicResponse.
 *
 * @category Dto
 * @package  Afrikpaysas\Lib\Dto
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Dto/BasicResponse.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class BasicResponse extends JsonResponse
{
    /**
     * Constructor
     *
     * @param mixed $result result
     *
     * @return void
     *
     * @psalm-suppress PossiblyInvalidArgument
     */
    public function __construct(mixed $result)
    {
        $response = new ModelBasicResponse();

        $response->code = AppConstants::SUCCESS_CODE;
        $response->message = AppConstants::SUCCESS_MESSAGE;
        $response->result = $result;

        parent::__construct($response);
    }
}
