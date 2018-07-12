<?php

namespace GpsApi\EspaceUserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GpsApiEspaceUserBundle:Default:index.html.twig');
    }
}
