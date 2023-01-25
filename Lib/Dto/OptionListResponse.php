<?php

/**
 * PHP Version 8.1
 * OptionListResponse.
 *
 * @category Dto
 * @package  Afrikpaysas\Lib\Dto
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Dto/OptionListResponse.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Lib\Dto;

use Afrikpaysas\Lib\Entity\Option;
use Afrikpaysas\Lib\Model\Collection;
use Afrikpaysas\Lib\Model\OptionDTOCollection;

/**
 * OptionListResponse.
 *
 * @category Dto
 * @package  Afrikpaysas\Lib\Dto
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Dto/OptionListResponse.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class OptionListResponse extends BasicResponse
{
    /**
     * Constructor.
     *
     * @param OptionDTOCollection|Collection<OptionDTO> $options options
     *
     * @return void
     */
    public function __construct(OptionDTOCollection|Collection $options)
    {
        parent::__construct($options->all());
    }
}
