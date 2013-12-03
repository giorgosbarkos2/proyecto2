<?php

namespace TheClickCms\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fotos
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Fotos
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
     * @ORM\ManyToOne(targetEntity="TheClickCms\AdminBundle\Entity\Usuarios", inversedBy="fotos")
     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
      * 
     */
    
    private $usuario;
    
    
    
    
    
    

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
     * Set usuario
     *
     * @param \TheClickCms\AdminBundle\Entity\Usuarios $usuario
     * @return Fotos
     */
    public function setUsuario(\TheClickCms\AdminBundle\Entity\Usuarios $usuario = null)
    {
        $this->usuario = $usuario;
    
        return $this;
    }

    /**
     * Get usuario
     *
     * @return \TheClickCms\AdminBundle\Entity\Usuarios 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}