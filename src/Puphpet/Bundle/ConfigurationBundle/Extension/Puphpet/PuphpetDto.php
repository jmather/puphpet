<?php

namespace Puphpet\Bundle\ConfigurationBundle\Extension\Puphpet;

class PuphpetDto
{

    private $version;

    public function setVersion($version)
    {
        $this->version = $version;
    }

    public function getVersion()
    {
        return $this->version;
    }
}
