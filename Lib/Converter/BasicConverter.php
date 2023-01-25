<?php

/**
 * PHP Version 8.1
 * BasicConverter.
 *
 * @category Converter
 * @package  Lib\Converter
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Converter/BasicConverter.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Converter;

//@codingStandardsIgnoreStart

use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\SerializerBuilder;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;

// @codingStandardsIgnoreEnd

/**
 * BasicConverter.
 *
 * @category Converter
 * @package  Lib\Converter
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Converter/BasicConverter.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
abstract class BasicConverter implements ParamConverterInterface
{
    protected string $converterClass;

    protected string $converterFormat;

    protected string $converterName;

    /**
     * Apply.
     *
     * @param Request        $request       request
     * @param ParamConverter $configuration configuration
     *
     * @return bool
     */
    abstract public function apply(
        Request $request,
        ParamConverter $configuration
    ): bool;

    /**
     * Supports.
     *
     * @param ParamConverter $configuration configuration
     *
     * @return bool
     */
    public function supports(ParamConverter $configuration): bool
    {
        return $configuration->getName() === $this->converterName;
    }

    /**
     * Supports.
     *
     * @param Request        $request       request
     * @param string         $requestClass  requestClass
     * @param ParamConverter $configuration configuration
     *
     * @return void
     *
     * @throws \Exception
     *
     * @psalm-suppress MixedAssignment
     */
    protected function processData(
        Request $request,
        string $requestClass,
        ParamConverter $configuration
    ): void {
        $data = (string) ($request->getContent());

        $serializer = SerializerBuilder::create()
            ->setPropertyNamingStrategy(
                new SerializedNameAnnotationStrategy(
                    new IdenticalPropertyNamingStrategy()
                )
            )
            ->build();

        $object = $serializer->deserialize(
            $data,
            $requestClass,
            $this->converterFormat
        );

        $request->attributes->set($configuration->getName(), $object);
    }
}
