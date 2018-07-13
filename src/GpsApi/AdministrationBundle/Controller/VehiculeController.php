<?php
/**
 * Created by PhpStorm.
 * User: Cyrine Hamm�mi
 * Date: 12/07/2018
 * Time: 15:46
 */

namespace GpsApi\AdministrationBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use GpsApi\AdministrationBundle\Entity\Vehicule;

class VehiculeController extends FOSRestController
{

    /**
     * @Rest\Get("api/vehicule")
     */
    public function getAction()
    {
        $result = $this->get('doctrine_mongodb')->getRepository('AdministrationBundle:Vehicule')->findAll();
        return $result;
    }

    /**
     * @Rest\Get("api/vehicule/{id}")
     */
    public function idAction($id)
    {
        $result = $this->get('doctrine_mongodb')->getRepository('AdministrationBundle:Vehicule')->find($id);
        return $result;
    }


    /**
     * @Rest\Post("api/vehicule/")
     */
    public function postAction(Request $request)
    {
        $data = new Vehicule();
        $matricule = $request->get('matricule');
        $idBoitier = $request->get('idBoitier');
        if(empty($matricule) || empty($idBoitier))
        {
            //return new View("NULL VALUES ARE NOT ALLOWED", Response::HTTP_NOT_ACCEPTABLE);
        }
        $data->setMatricule($matricule);
        $data->setIdBoitier($idBoitier);
        $em = $this->get('doctrine_mongodb')->getManager();
        $em->persist($data);
        $em->flush();
        return "Vehicule Added Successfully";
    }

    /**
     * @Rest\Put("api/vehicule/{id}")
     */
    public function updateAction($id,Request $request)
    {
        $matricule = $request->get('matricule');
        $idBoitier = $request->get('idBoitier');
        $sn = $this->get('doctrine_mongodb')->getManager();
        $vehicule = $this->getDoctrine()->getRepository('AdministrationBundle:Vehicule')->find($id);
        if (empty($vehicule)) {
            return "Vehicule not found";
        }
        elseif(!empty($matricule) && !empty($idBoitier)){
            $vehicule->setMatricule($matricule);
            $vehicule->setIdBoitier($idBoitier);
            $sn->flush();
            return "Vehicule Updated Successfully";
        }
        elseif(empty($matricule) && !empty($idBoitier)){
            $vehicule->setIdBoitier($idBoitier);
            $sn->flush();
            return "ID Boitier Updated Successfully";
        }
        elseif(!empty($matricule) && empty($idBoitier)){
            $vehicule->setMatricule($matricule);
            $sn->flush();
            return "Matricule Updated Successfully";
        }
        else
            return "Matricule or IDBoitier cannot be empty";
    }
}