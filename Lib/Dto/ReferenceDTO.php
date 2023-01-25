<?php

/**
 * PHP Version 8.1
 * ReferenceDTO.
 *
 * @category Dto
 * @package  Lib\Dto
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Dto/ReferenceDTO.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Dto;

use Lib\Model\BaseEntityDTO;

/**
 * PHP Version 8.1
 * ReferenceDTO.
 *
 * @category Dto
 * @package  Lib\Dto
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Dto/ReferenceDTO.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 *
 * @psalm-suppress MissingConstructor
 */
class ReferenceDTO extends BaseEntityDTO
{
    public int $referenceId;
    public string $referenceNumber;
    public ?float $amount = null;
    public string $generationDate;
    public string $expirationDate;
    public ?string $name;
}
