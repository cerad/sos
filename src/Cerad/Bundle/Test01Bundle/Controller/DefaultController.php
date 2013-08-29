<?php

namespace Cerad\Bundle\Test01Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CeradTest01Bundle:Default:index.html.twig', array('name' => $name));
    }
}
