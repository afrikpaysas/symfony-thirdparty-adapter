<?php

/**
 * PHP Version 8.1
 * BasicListResponse.
 *
 * @category Dto
 * @package  Afrikpaysas\Lib\Dto
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Dto/BasicListResponse.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Lib\Dto;

/**
 * BasicListResponse.
 *
 * @category Dto
 * @package  Afrikpaysas\Lib\Dto
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Dto/BasicListResponse.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 *
 * @psalm-suppress MissingConstructor
 */
class BasicListResponse
{
    public int $code;
    public string $message;
    public ?array $result;
}
