<?php

namespace Puphpet\Bundle\ConfigurationBundle\Dto;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Simple DTO class which holds all other DTOs of the extensions.
 *
 * A DTO is enabled by defining its service in this way:
 *
 * <service id="configuration.extension.xxx" class="%path%\XXXDto">
 *   <tag name="configuration.extension" configuration="xxx" />
 * </service>
 */
class ConfigurationDto
{
    private $enabledDtos = array();

    /**
     * @Assert\Valid(traverse = true)
     */
    private $configuration = array();

    public function __construct(array $enabledDtos = array())
    {
        $this->enabledDtos = $enabledDtos;
        $this->init();
    }

    private function init()
    {
        foreach ($this->enabledDtos as $key => $dto) {
            $this->configuration[$key] = $dto;
        }
    }

    public function __call($method, array $arguments)
    {
        // property access
        if (array_key_exists($method, $this->configuration)) {
            return $this->configuration[$method];
        }

        // setter/getter!?
        $ter = substr($method, 0, 3);
        $name = lcfirst(substr($method, 3));

        if (!array_key_exists($name, $this->enabledDtos)) {
            throw new \InvalidArgumentException(sprintf('Configuration does not support "%s"', $name));
        }

        if ('get' == $ter) {
            return $this->configuration[$name];
        } elseif ('set' == $ter) {
            $this->configuration[$name] = $arguments;
        } else {
            throw new \InvalidArgumentException(sprintf('Invalid operation on Configuration found "%s"', $ter));
        }
    }

    public function get($name)
    {
        if (!array_key_exists($name, $this->configuration)) {
            throw new \InvalidArgumentException(sprintf('Configuration does not support "%s"', $name));
        }

        return $this->configuration[$name];
    }
}