<?php

/**
 * PHP Version 8.1
 * ReferenceResponse.
 *
 * @category Model
 * @package  Afrikpaysas\Lib\Model
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Model/ReferenceResponse.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Lib\Model;

use Afrikpaysas\Lib\Dto\ReferenceDTO;

/**
 * ReferenceResponse.
 *
 * @category Model
 * @package  Afrikpaysas\Lib\Model
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Model/ReferenceResponse.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 *
 * @psalm-suppress MissingConstructor
 */
class ReferenceResponse
{
    public int $code;
    public string $message;
    public ReferenceDTO $result;
    public ?array $options;
}
