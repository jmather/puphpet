<?php

namespace Puphpet\Bundle\ConfigurationBundle\Configuration;

use Puphpet\Bundle\ConfigurationBundle\Dto\ConfigurationDto;

/**
 * Builds pre-selected configuration
 */
class ConfigurationBuilder
{

    private $configuration;

    private $editions;

    public function __construct(ConfigurationDto $configuration /*, array $editions*/)
    {
        $this->configuration = $configuration;
        //$this->editions = $editions;
    }

    public function build()
    {
        /*
                if (array_key_exists($edition, $this->editions)) {
                    throw new \InvalidArgumentException(sprintf('Edition "%s" not registered!', $edition));
                }
        */

        // @TODO this has to be done by plugin system
        $this->configuration->get('apache')->setModules(['rewrite']);

        return $this->configuration;
    }
}