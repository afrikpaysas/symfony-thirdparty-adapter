<?php

/**
 * PHP Version 8.1
 * ConfigController.
 *
 * @category Controller
 * @package  App\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Controller/ConfigController.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace App\Controller;

use FOS\RestBundle\Controller\Annotations\Route;
use Lib\Controller\ConfigController as BaseConfigController;
use Lib\Dto\ArrayResponse;
use Lib\Exception\ConfigException;
use Lib\Model\AppConstants;
use Lib\Model\SystemExceptionMessage;
use Lib\Service\UtilService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use \ReflectionClass;

/**
 * ConfigController.
 *
 * @category Controller
 * @package  App\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Controller/ConfigController.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
#[Route('/config')]
class ConfigController extends AbstractController implements BaseConfigController
{
    protected UtilService $utilService;

    /**
     * Constructor.
     *
     * @param UtilService $utilService utilService
     *
     * @return void
     */
    public function __construct(UtilService $utilService)
    {
        $this->utilService = $utilService;
    }

    /**
     * Parameters API.
     *
     * @return ArrayResponse
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     */
    #[Route("/parameters")]
    public function parameters(): ArrayResponse
    {
        if (AppConstants::PARAMETER_TRUE_VALUE != $_ENV['SHOW_CONFIG']) {
            throw new ConfigException();
        }

        $config = [];

        foreach ($_ENV as $key => $value) {
            $camelKey = $this->utilService->dashesToCamelCase(
                $key,
                AppConstants::SEPARATOR_PARAMETER
            );
            if (!in_array($camelKey, AppConstants::EXCLUDE_API_CONFIG_PARAMETERS)) {
                $config[$camelKey] = $value;
            }
        }

        return new ArrayResponse($config);
    }

    /**
     * Exceptions API.
     *
     * @return ArrayResponse
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     *
     * @psalm-suppress MixedAssignment
     * @psalm-suppress MixedArrayAccess
     * @psalm-suppress MixedArgument
     */
    #[Route("/exceptions")]
    public function exceptions(): ArrayResponse
    {
        $reflectionClass = new ReflectionClass(
            SystemExceptionMessage::class
        );

        $data = $reflectionClass->getConstants();

        $exceptions = [];

        foreach ($data as $key => $value) {
            $camelKey = $this->utilService->dashesToCamelCase(
                $key,
                AppConstants::SEPARATOR_PARAMETER
            );
            $code = sprintf(
                $value[AppConstants::CODE],
                $_ENV['APP_CODE'],
                ''
            );

            $exceptions[$camelKey] = [
                AppConstants::CODE => (int) $code,
                AppConstants::MESSAGE => $value[AppConstants::MESSAGE],
            ];
        }

        return new ArrayResponse($exceptions);
    }
}
