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
     * @var string
     *
     * @ORM\Column(name="pais", type="text" ,nullable=true )
     */
    
    
    

  
    private $pais;
    
    
              /**
     * @var string
     *
     * @ORM\Column(name="detalle", type="text" ,nullable=true )
     */
    
    
    private $detalle;
    
    
           /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="text" ,nullable=true )
     */
    
    
    
    
    
    private $nombre;
    
    
          /**
     * @var string
     *
     * @ORM\Column(name="email", type="text" ,nullable=true )
     */
    
    private $email;
    
    
             /**
     * @var string
     *
     * @ORM\Column(name="cargo", type="text" ,nullable=true )
     */
    
    
    private $cargo;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="empresa", type="text" ,nullable=true )
     */
    
    
    
    private $empresa;
    
 
    
    
     /**
     * @ORM\OneToMany(targetEntity="TheClickCms\AdminBundle\Entity\Actualizaciones", mappedBy="usuarios" , cascade={"remove"})
     */
    
    
      private $actualizaciones;
    
    
    
    /**
     * @ORM\OneToMany(targetEntity="TheClickCms\AdminBundle\Entity\Fotos", mappedBy="usuarios" , cascade={"remove"})
     */
    
     private $fotos;
    
    
    
    
}
