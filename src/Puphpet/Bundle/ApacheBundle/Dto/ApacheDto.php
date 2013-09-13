<?php

namespace Puphpet\Bundle\ApacheBundle\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class ApacheDto
{
    /**
     * @var array
     */
    private $vhosts = array();

    /**
     * @var array
     */
    private $modules;

    public function setModules(array $modules = array())
    {
        $this->modules = $modules;
    }

    public function getModules()
    {
        return $this->modules;
    }

    /**
     * @param VhostDto $vhost
     */
    public function addVhost(VhostDto $vhost)
    {
        $this->vhosts[] = $vhost;
    }

    public function removeVhost(VhostDto $vhost)
    {
        // @TODO ignored, tmp needed during form debugging
    }

    /**
     * @return array
     */
    public function getVhosts()
    {
        return $this->vhosts;
    }
}
