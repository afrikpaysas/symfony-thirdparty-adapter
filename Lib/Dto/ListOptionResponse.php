<?php

/**
 * PHP Version 8.1
 * ListOptionResponse.
 *
 * @category Dto
 * @package  Afrikpaysas\Lib\Dto
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Dto/ListOptionResponse.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Lib\Dto;

use Afrikpaysas\Lib\Model\OptionCollection;

/**
 * ListOptionResponse.
 *
 * @category Dto
 * @package  Afrikpaysas\Lib\Dto
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Dto/ListOptionResponse.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 *
 * @psalm-suppress MissingConstructor
 */
class ListOptionResponse
{
    public int $code;
    public string $message;
    public ?OptionCollection $result;
}
