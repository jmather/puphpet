<?php

namespace Puphpet\Bundle\ConfigurationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class ConfigurationController extends Controller
{
    /**
     * @Template
     */
    public function showAction(Request $request)
    {
        $configuration = $this->get('configuration.builder.default')->build();

        $form = $this->createForm($this->get('configuration.type.default'), $configuration);

        return ['form' => $form->createView()];
    }
}
