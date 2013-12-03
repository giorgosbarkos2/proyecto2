<?php

namespace TheClickCms\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuarios
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Usuarios
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
     * @ORM\OneToMany(targetEntity="TheClickCms\AdminBundle\Entity\Actualizaciones", mappedBy="usuarios" , cascade={"remove"})
     */
    
    
      private $actualizaciones;
    
    
    
    /**
     * @ORM\OneToMany(targetEntity="TheClickCms\AdminBundle\Entity\Fotos", mappedBy="usuarios" , cascade={"remove"})
     */
    
     private $fotos;
    
    
    
    
}
