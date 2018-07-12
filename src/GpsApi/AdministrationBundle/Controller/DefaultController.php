<?php

namespace GpsApi\AdministrationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GpsApiAdministrationBundle:Default:index.html.twig');
    }
}
