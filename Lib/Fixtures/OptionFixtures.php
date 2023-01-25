<?php

/**
 * PHP Version 8.1
 * OptionFixtures.
 *
 * @category Exception
 * @package  Lib\Fixtures
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Fixtures/OptionFixtures.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Fixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Lib\Dto\OptionRequest;
use Lib\Dto\OptionRequestCollectionRequest;
use Lib\Model\AppConstants;
use Lib\Service\OptionService;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Yaml\Yaml;

/**
 * OptionFixtures.
 *
 * @category Fixtures
 * @package  Lib\Fixtures
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Fixtures/OptionFixtures.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class OptionFixtures extends Fixture
{
    protected OptionService $optionService;
    protected KernelInterface $kernel;

    /**
     * Constructor.
     *
     * @param OptionService   $optionService optionService
     * @param KernelInterface $kernel        kernel
     *
     * @return void
     */
    public function __construct(
        OptionService $optionService,
        KernelInterface $kernel
    ) {
        $this->optionService = $optionService;
        $this->kernel = $kernel;
    }

    /**
     * Load.
     *
     * @param ObjectManager $manager manager
     *
     * @return void
     */
    public function load(ObjectManager $manager)
    {
        $this->loadOption($manager);
    }

    /**
     * LoadOption
     *
     * @param ObjectManager $manager manager
     *
     * @return void
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     * @SuppressWarnings(PHPMD.Superglobals)
     * @SuppressWarnings(PHPMD.StaticAccess)
     *
     * @psalm-suppress MixedAssignment
     * @psalm-suppress MixedArrayAccess
     */
    protected function loadOption(ObjectManager $manager)
    {
        $data = Yaml::parse(
            file_get_contents(
                $this->kernel->getProjectDir() . $_ENV['OPTIONS_FILE']
            )
        );

        $request = new OptionRequestCollectionRequest();

        foreach ($data[AppConstants::OPTIONS] as $key => $value) {
            $optionRequest = new OptionRequest();

            $optionRequest->slug = $key;
            $optionRequest->name = $value[AppConstants::NAME];
            $optionRequest->amount = $value[AppConstants::AMOUNT];

            $request->add($optionRequest);
        }

        $this->optionService->createList($request);
    }
}
