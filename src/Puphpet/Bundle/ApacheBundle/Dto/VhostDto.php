<?php

namespace Puphpet\Bundle\ApacheBundle\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class VhostDto
{
    /**
     * @var string
     */
    private $serverName;

    /**
     * @var array
     */
    private $serverAliases = array();

    /**
     * @var string
     */
    private $documentRoot;

    /**
     * @var int
     */
    private $port;

    /**
     * @var array
     */
    private $envVars;

    /**
     * @param string $documentRoot
     */
    public function setDocumentRoot($documentRoot)
    {
        $this->documentRoot = $documentRoot;
    }

    /**
     * @return string
     */
    public function getDocumentRoot()
    {
        return $this->documentRoot;
    }

    /**
     * @param array $envVars
     */
    public function setEnvVars($envVars)
    {
        $this->envVars = $envVars;
    }

    /**
     * @return array
     */
    public function getEnvVars()
    {
        return $this->envVars;
    }

    /**
     * @param int $port
     */
    public function setPort($port)
    {
        $this->port = $port;
    }

    /**
     * @return int
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @param array $serverAliases
     */
    public function setServerAliases($serverAliases)
    {
        $this->serverAliases = $serverAliases;
    }

    /**
     * @return array
     */
    public function getServerAliases()
    {
        return $this->serverAliases;
    }

    /**
     * @param string $serverName
     */
    public function setServerName($serverName)
    {
        $this->serverName = $serverName;
    }

    /**
     * @return string
     */
    public function getServerName()
    {
        return $this->serverName;
    }
}
