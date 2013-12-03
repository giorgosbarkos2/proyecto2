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
     * @ORM\OneToMany(targetEntity="TheClickCms\AdminBundle\Entity\Actualizacion", mappedBy="usuarios" , cascade={"remove"})
     */
    
    
      private $actualizaciones;
    
    
    
    /**
     * @ORM\OneToMany(targetEntity="TheClickCms\AdminBundle\Entity\Fotos", mappedBy="usuarios" , cascade={"remove"})
     */
    
     private $fotos;
    
    
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->actualizaciones = new \Doctrine\Common\Collections\ArrayCollection();
        $this->fotos = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * Set pais
     *
     * @param string $pais
     * @return Usuarios
     */
    public function setPais($pais)
    {
        $this->pais = $pais;
    
        return $this;
    }

    /**
     * Get pais
     *
     * @return string 
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * Set detalle
     *
     * @param string $detalle
     * @return Usuarios
     */
    public function setDetalle($detalle)
    {
        $this->detalle = $detalle;
    
        return $this;
    }

    /**
     * Get detalle
     *
     * @return string 
     */
    public function getDetalle()
    {
        return $this->detalle;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Usuarios
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Usuarios
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set cargo
     *
     * @param string $cargo
     * @return Usuarios
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
    
        return $this;
    }

    /**
     * Get cargo
     *
     * @return string 
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Set empresa
     *
     * @param string $empresa
     * @return Usuarios
     */
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;
    
        return $this;
    }

    /**
     * Get empresa
     *
     * @return string 
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Add actualizaciones
     *
     * @param \TheClickCms\AdminBundle\Entity\Actualizaciones $actualizaciones
     * @return Usuarios
     */
    public function addActualizacione(\TheClickCms\AdminBundle\Entity\Actualizaciones $actualizaciones)
    {
        $this->actualizaciones[] = $actualizaciones;
    
        return $this;
    }

    /**
     * Remove actualizaciones
     *
     * @param \TheClickCms\AdminBundle\Entity\Actualizaciones $actualizaciones
     */
    public function removeActualizacione(\TheClickCms\AdminBundle\Entity\Actualizaciones $actualizaciones)
    {
        $this->actualizaciones->removeElement($actualizaciones);
    }

    /**
     * Get actualizaciones
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getActualizaciones()
    {
        return $this->actualizaciones;
    }

    /**
     * Add fotos
     *
     * @param \TheClickCms\AdminBundle\Entity\Fotos $fotos
     * @return Usuarios
     */
    public function addFoto(\TheClickCms\AdminBundle\Entity\Fotos $fotos)
    {
        $this->fotos[] = $fotos;
    
        return $this;
    }

    /**
     * Remove fotos
     *
     * @param \TheClickCms\AdminBundle\Entity\Fotos $fotos
     */
    public function removeFoto(\TheClickCms\AdminBundle\Entity\Fotos $fotos)
    {
        $this->fotos->removeElement($fotos);
    }

    /**
     * Get fotos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFotos()
    {
        return $this->fotos;
    }
}