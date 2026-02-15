<?php

namespace VHUG\ContaoBasic\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class ContaoBasicExtension extends Extension
{

	public function load(array $configs, ContainerBuilder $container): void
    {
        // Load services
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../../config'));
     	$loader->load('parameters.yaml');
     	$loader->load('services.yaml');
    }

    public function registerContainerConfiguration(LoaderInterface $loader, array $managerConfig): void
    {
        $loader->load('@ContaoBasic/config/config.yaml');
    }
}
