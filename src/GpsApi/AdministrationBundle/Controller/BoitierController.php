<?php
/**
 * Created by PhpStorm.
 * User: Cyrine Hamm�mi
 * Date: 12/07/2018
 * Time: 15:46
 */

namespace GpsApi\AdministrationBundle\Controller;

use GpsApi\AdministrationBundle\Entity\Boitier;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BoitierController extends FOSRestController
{


    /**
     * @Rest\Get("api/boitier")
     */
    public function getAction()
    {
        $result = $this->get('doctrine_mongodb')->getRepository('AdministrationBundle:Boitier')->findAll();
        if ($result === null) {
            //return new View("there are no users exist", Response::HTTP_NOT_FOUND);
        }
        return $result;
    }

    /**
     * @Rest\Get("api/boitier/{id}")
     */
    public function idAction($id)
    {
        $result = $this->get('doctrine_mongodb')->getRepository('AdministrationBundle:boitier')->find($id);
        if ($result === null) {
            //return new View("user not found", Response::HTTP_NOT_FOUND);
        }
        return $result;
    }

    /**
     * @Rest\Post("api/boitier/")
     */
    public function postAction(Request $request)
    {
        $data = new Boitier();
        $numTel = $request->get('numTel');
        $IMEI = $request->get('IMEI');
        if(empty($numTel) || empty($IMEI))
        {
            return "NULL VALUES ARE NOT ALLOWED";
        }
        $data->setName($numTel);
        $data->setRole($IMEI);
        $em = $this->get('doctrine_mongodb')->getManager();
        $em->persist($data);
        $em->flush();
        //  return new View("User Added Successfully", Response::HTTP_OK);
    }

    /**
     * @Rest\Put("api/boitier/{id}")
     */
    public function updateAction($id,Request $request)
    {
        $numTel = $request->get('numTel');
        $IMEI = $request->get('IMEI');
        $sn = $this->getDoctrine()->getManager();
        $boitier = $this->get('doctrine_mongodb')->getRepository('AdministrationBundle:Boitier')->find($id);
        if (empty($boitier)) {
            return "boitier not found";
        }
        elseif(!empty($numTel) && !empty($IMEI)){
            $boitier->setNumTel($numTel);
            $boitier->setIMEI($IMEI);
            $sn->flush();
            return "boitier Updated Successfully";
        }
        elseif(empty($numTel) && !empty($IMEI)){
            $boitier->setIMEI($IMEI);
            $sn->flush();
            return "$IMEI Updated Successfully";
        }
        elseif(!empty($numTel) && empty($IMEI)){
            $boitier->setNumTel($numTel);
            $sn->flush();
            return "NumTel Updated Successfully";
        }
        else
            return "NumTel or $IMEI cannot be empty";
    }
}