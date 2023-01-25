<?php

/**
 * PHP Version 8.1
 * ReferenceController.
 *
 * @category Controller
 * @package  Lib\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Controller/ReferenceController.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Controller;

use Lib\Dto\OptionListResponse;
use Lib\Dto\ReferenceResponse;
use Lib\Exception\PaymentException;
use Lib\Exception\ReferenceException;
use Lib\Exception\VerifyException;

/**
 * ReferenceController.
 *
 * @category Controller
 * @package  Lib\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Controller/ReferenceController.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
interface ReferenceController
{
    /**
     * ListReference API.
     *
     * @param string $reference reference
     *
     * @return OptionListResponse
     *
     * @throws VerifyException|ReferenceException
     */
    public function listReference(string $reference): OptionListResponse;

    /**
     * Reference API.
     *
     * @param string $reference reference
     *
     * @return ReferenceResponse
     *
     * @throws VerifyException|PaymentException
     */
    public function reference(string $reference): ReferenceResponse;
}
