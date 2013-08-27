<?php

namespace Puphpet\Bundle\ConfigurationBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Adds all the (form) event subscribers from extensions to ConfigurationType.
 */
class ConfigurationTypeSubscriberPass implements CompilerPassInterface
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
        $subscribers = array();

        foreach ($container->findTaggedServiceIds('configuration.type.subscriber') as $id => $attributes) {
            $subscribers[] = $container->getDefinition($id);
        }

        $configuration = $container->getDefinition('configuration.type.configuration');
        $configuration->replaceArgument(0, $subscribers);
    }
}