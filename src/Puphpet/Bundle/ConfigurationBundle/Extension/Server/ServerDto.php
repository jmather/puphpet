<?php

namespace Puphpet\Bundle\ConfigurationBundle\Extension\Server;

use Symfony\Component\Validator\Constraints as Assert;

class ServerDto
{
    /**
     * @var array
     * @Assert\Type(type="array", message="server.dto.packages.no_array")
     */
    private $packages;

    public function setPackages(array $packages = array())
    {
        $this->packages = $packages;
    }

    public function getPackages()
    {
        return $this->packages;
    }
}
