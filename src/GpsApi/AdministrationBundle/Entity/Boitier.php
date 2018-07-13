<?php
/**
 * Created by PhpStorm.
 * User: Cyrine Hamm�mi
 * Date: 12/07/2018
 * Time: 15:29
 */

namespace GpsApi\AdministrationBundle\Entity;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @Document(db="gps", collection="boitier") */

class boitier{

    /** @Id(strategy="AUTO", type="string") */

    protected $id;

    /**
     * @MongoDB\Field(type="string")
     */
    private $numTel = "";

    /**
     * @MongoDB\Field(type="string")
     */
    private $IMEI;

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
    public function getNumTel()
    {
        return $this->numTel;
    }

    /**
     * @param mixed $numTel
     */
    public function setNumTel($numTel)
    {
        $this->numTel = $numTel;
    }

    /**
     * @return mixed
     */
    public function getIMEI()
    {
        return $this->IMEI;
    }

    /**
     * @param mixed $IMEI
     */
    public function setIMEI($IMEI)
    {
        $this->IMEI = $IMEI;
    }


}