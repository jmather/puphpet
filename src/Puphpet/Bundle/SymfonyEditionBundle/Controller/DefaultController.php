<?php

namespace Puphpet\Bundle\SymfonyEditionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PuphpetSymfonyEditionBundle:Default:index.html.twig', array('name' => $name));
    }
}
