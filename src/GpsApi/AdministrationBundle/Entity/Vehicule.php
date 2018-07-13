<?php
/**
 * Created by PhpStorm.
 * User: Cyrine Hamm�mi
 * Date: 12/07/2018
 * Time: 15:07
 */
namespace GpsApi\AdministrationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/** @Document(db="gps", collection="vehicule") */

class Vehicule
{

    /** @Id(strategy="AUTO", type="string") */

    protected $id;

    /**
     * @MongoDB\Field(type="string")
     */
    private $matricule = "";

    /**
     *
     *@@MongoDB\OneToOne(targetEntity="GpsApi\AdministrationBundle\Entity\Boitier", cascade={"persist"})
     */
    private $idBoitier;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * @param mixed $matricule
     */
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;
    }

    /**
     * @return mixed
     */
    public function getIdBoitier()
    {
        return $this->idBoitier;
    }

    /**
     * @param mixed $idBoitier
     */
    public function setIdBoitier($idBoitier)
    {
        $this->idBoitier = $idBoitier;
    }


}

