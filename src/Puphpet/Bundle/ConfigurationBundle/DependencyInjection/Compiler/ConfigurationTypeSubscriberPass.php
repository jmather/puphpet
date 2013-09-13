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
        $types = array();
        $subscribers = array();

        // fetch configuration types first, which get the subscribers assigned
        foreach ($container->findTaggedServiceIds('configuration.type') as $id => $attributes) {
            $edition = isset($attributes[0]['edition']) ? $attributes[0]['edition'] : 'default';

            $types[$edition] = $container->getDefinition($id);
        }

        // fetch all form subscribers, group them by edition
        foreach ($container->findTaggedServiceIds('configuration.type.subscriber') as $id => $attributes) {
            $edition = isset($attributes[0]['edition']) ? $attributes[0]['edition'] : 'default';

            if (!array_key_exists($edition, $subscribers)) {
                $subscribers[$edition] = array();
            }

            $subscribers[$edition][] = $container->getDefinition($id);
        }

        // map subscribers to types
        foreach ($types as $edition => $typeDefinition) {

            if (array_key_exists($edition, $subscribers)) {
                $typeDefinition->replaceArgument(0, $subscribers[$edition]);
            }
        }
    }
}