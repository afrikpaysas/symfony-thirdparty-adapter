<?php

/**
 * PHP Version 8.1
 * PaymentRequestConverter.
 *
 * @category Converter
 * @package  Lib\Converter
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Converter/PaymentRequestConverter.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Converter;

use Lib\Dto\PaymentRequest;
use Lib\Model\AppConstants;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;

/**
 * PHP Version 8.1
 * PaymentRequestConverter.
 *
 * @category Converter
 * @package  Lib\Converter
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Converter/PaymentRequestConverter.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
class PaymentRequestConverter extends BasicConverter
{
    /**
     * Constructor.
     *
     * @param string $converterName   converterName
     * @param string $converterFormat converterFormat
     * @param string $converterClass  converterClass
     *
     * @return void
     */
    public function __construct(
        string $converterName = AppConstants::CONVERTER_REQUEST,
        string $converterFormat = AppConstants::CONVERTER_FORMAT,
        string $converterClass = PaymentRequest::class
    ) {
        $this->converterClass = $converterClass;
        $this->converterFormat = $converterFormat;
        $this->converterName = $converterName;
    }

    /**
     * Apply.
     *
     * @param Request        $request       request
     * @param ParamConverter $configuration configuration
     *
     * @return bool
     */
    public function apply(Request $request, ParamConverter $configuration): bool
    {
        $this->processData($request, $this->converterClass, $configuration);

        return true;
    }
}
