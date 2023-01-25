<?php

/**
 * PHP Version 8.1
 * OptionListResponse.
 *
 * @category Dto
 * @package  Lib\Dto
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Dto/OptionListResponse.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Dto;

use Lib\Entity\Option;
use Lib\Model\Collection;
use Lib\Model\OptionDTOCollection;

/**
 * OptionListResponse.
 *
 * @category Dto
 * @package  Lib\Dto
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Dto/OptionListResponse.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
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
