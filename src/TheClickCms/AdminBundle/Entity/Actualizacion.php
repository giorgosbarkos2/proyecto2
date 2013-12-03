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
     * @var \DateTime
     *
     * @ORM\Column(name="fechaActualizacion", type="datetime" , nullable=true )
     */
    
    private $fechaActualizacion;
    
    
   
    
    /**
     * @ORM\OneToMany(targetEntity="TheClickCms\AdminBundle\Entity\Archivos", mappedBy="productos" , cascade={"remove"})
     */
    
    
    
 
    
    private $archivos;
    
    
    
}
