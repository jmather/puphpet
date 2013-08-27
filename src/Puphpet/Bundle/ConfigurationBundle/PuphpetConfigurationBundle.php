<?php

namespace Puphpet\Bundle\ConfigurationBundle;

use Puphpet\Bundle\ConfigurationBundle\DependencyInjection\Compiler\ConfigurationMappingPass;
use Puphpet\Bundle\ConfigurationBundle\DependencyInjection\Compiler\ConfigurationTypeSubscriberPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class PuphpetConfigurationBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new ConfigurationMappingPass());
        $container->addCompilerPass(new ConfigurationTypeSubscriberPass());

    }
}
