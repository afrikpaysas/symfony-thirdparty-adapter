<?php

namespace Afrikpaysas\SymfonyThirdpartyAdapter\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class AfrikpaysasSymfonyThirdpartyAdapterExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $containerBuilder)
    {
        $loader = new YamlFileLoader(
            $containerBuilder,
            new FileLocator(__DIR__.'/../Resources/config')
        );
        $loader->load('services.yaml');
    }
}