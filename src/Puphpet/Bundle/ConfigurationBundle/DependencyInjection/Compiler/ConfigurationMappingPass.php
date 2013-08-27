<?php

namespace Puphpet\Bundle\ConfigurationBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class ConfigurationMappingPass implements CompilerPassInterface
{
    /**
     * You can modify the container here before it is dumped to PHP code.
     *
     * @param ContainerBuilder $container
     *
     * @api
     */
    public function process(ContainerBuilder $container)
    {
        $enabledConfigurations = array();
        foreach ($container->findTaggedServiceIds('configuration.extension') as $id => $attributes) {
            if (isset($attributes[0]['configuration'])) {
                $extendingConfiguration = $attributes[0]['configuration'];
                $enabledConfigurations[$extendingConfiguration] = $container->getDefinition($id);
            }
        }

        $configuration = $container->getDefinition('configuration.configuration');
        $configuration->replaceArgument(0, $enabledConfigurations);
    }
}