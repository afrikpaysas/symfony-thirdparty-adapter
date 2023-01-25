<?php

/**
 * PHP Version 8.1
 * OptionResponse.
 *
 * @category Dto
 * @package  Lib\Dto
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Dto/OptionResponse.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Dto;

/**
 * OptionResponse.
 *
 * @category Dto
 * @package  Lib\Dto
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Dto/OptionResponse.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class OptionResponse extends BasicResponse
{
    /**
     * Constructor.
     *
     * @param OptionDTO $response response
     *
     * @return void
     */
    public function __construct(OptionDTO $response)
    {
        parent::__construct($response);
    }
}
