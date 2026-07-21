<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk;

use ChuckBartowski\ScalewaySdk\Client\ScalewayClient;
use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

use function Symfony\Component\DependencyInjection\Loader\Configurator\service;

final class ScalewaySdkBundle extends AbstractBundle
{
    protected string $extensionAlias = 'scaleway_sdk';

    public function configure(DefinitionConfigurator $definition): void
    {
        $definition->rootNode()
            ->children()
                ->scalarNode('secret_key')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('default_project_id')->defaultValue('')->end()
                ->scalarNode('default_zone')->defaultValue('fr-par-1')->end()
                ->scalarNode('default_region')->defaultValue('fr-par')->end()
                ->floatNode('timeout')->defaultValue(30.0)->end()
            ->end();
    }

    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        $services = $container->services();

        $services->set(ScalewayClient::class)
            ->args([
                $config['secret_key'],
                $config['default_project_id'],
                $config['default_zone'],
                $config['default_region'],
                $config['timeout'],
                service('http_client')->nullOnInvalid(),
            ]);

        $services->set(Scaleway::class)
            ->args([service(ScalewayClient::class)])
            ->public();

        $services->alias('scaleway_sdk.scaleway', Scaleway::class)->public();
    }
}
