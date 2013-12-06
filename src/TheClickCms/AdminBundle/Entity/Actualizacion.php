<?php

namespace TheClickCms\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Actualizacion
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Actualizacion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;





     /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text" ,nullable=true )
     */


    private $descripcion;


      /**
     * @var string
     *
     * @ORM\Column(name="descripcionCorta", type="text" ,nullable=true )
     */






    private $descripcionCorta;



      /**
     * @var string
     *
     * @ORM\Column(name="version", type="text" ,nullable=true )
     */




    private $version;






    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaActualizacion", type="datetime" , nullable=true )
     */

    private $fechaActualizacion;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Actualizacion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set descripcionCorta
     *
     * @param string $descripcionCorta
     * @return Actualizacion
     */
    public function setDescripcionCorta($descripcionCorta)
    {
        $this->descripcionCorta = $descripcionCorta;
    
        return $this;
    }

    /**
     * Get descripcionCorta
     *
     * @return string 
     */
    public function getDescripcionCorta()
    {
        return $this->descripcionCorta;
    }

    /**
     * Set version
     *
     * @param string $version
     * @return Actualizacion
     */
    public function setVersion($version)
    {
        $this->version = $version;
    
        return $this;
    }

    /**
     * Get version
     *
     * @return string 
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set fechaActualizacion
     *
     * @param \DateTime $fechaActualizacion
     * @return Actualizacion
     */
    public function setFechaActualizacion($fechaActualizacion)
    {
        $this->fechaActualizacion = $fechaActualizacion;
    
        return $this;
    }

    /**
     * Get fechaActualizacion
     *
     * @return \DateTime 
     */
    public function getFechaActualizacion()
    {
        return $this->fechaActualizacion;
    }
}