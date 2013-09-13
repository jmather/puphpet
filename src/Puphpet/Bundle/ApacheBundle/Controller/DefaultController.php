<?php

namespace Puphpet\Bundle\ApacheBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PuphpetApacheBundle:Default:index.html.twig', array('name' => $name));
    }
}
