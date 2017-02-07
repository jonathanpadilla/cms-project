<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsPagina
 *
 * @ORM\Table(name="cms_pagina")
 * @ORM\Entity
 */
class CmsPagina
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pag_id_pk", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pagIdPk;

    /**
     * @var string
     *
     * @ORM\Column(name="pag_nombre", type="string", length=100, nullable=true)
     */
    private $pagNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="pag_controller", type="string", length=100, nullable=true)
     */
    private $pagController;

    /**
     * @var integer
     *
     * @ORM\Column(name="pag_orden", type="integer", nullable=true)
     */
    private $pagOrden;

    /**
     * @var integer
     *
     * @ORM\Column(name="pag_eliminado", type="integer", nullable=true)
     */
    private $pagEliminado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pag_fecha_registro", type="datetime", nullable=true)
     */
    private $pagFechaRegistro;

    /**
     * @var string
     *
     * @ORM\Column(name="pag_comentario", type="text", length=65535, nullable=true)
     */
    private $pagComentario;



    /**
     * Get pagIdPk
     *
     * @return integer
     */
    public function getPagIdPk()
    {
        return $this->pagIdPk;
    }

    /**
     * Set pagNombre
     *
     * @param string $pagNombre
     *
     * @return CmsPagina
     */
    public function setPagNombre($pagNombre)
    {
        $this->pagNombre = $pagNombre;

        return $this;
    }

    /**
     * Get pagNombre
     *
     * @return string
     */
    public function getPagNombre()
    {
        return $this->pagNombre;
    }

    /**
     * Set pagController
     *
     * @param string $pagController
     *
     * @return CmsPagina
     */
    public function setPagController($pagController)
    {
        $this->pagController = $pagController;

        return $this;
    }

    /**
     * Get pagController
     *
     * @return string
     */
    public function getPagController()
    {
        return $this->pagController;
    }

    /**
     * Set pagOrden
     *
     * @param integer $pagOrden
     *
     * @return CmsPagina
     */
    public function setPagOrden($pagOrden)
    {
        $this->pagOrden = $pagOrden;

        return $this;
    }

    /**
     * Get pagOrden
     *
     * @return integer
     */
    public function getPagOrden()
    {
        return $this->pagOrden;
    }

    /**
     * Set pagEliminado
     *
     * @param integer $pagEliminado
     *
     * @return CmsPagina
     */
    public function setPagEliminado($pagEliminado)
    {
        $this->pagEliminado = $pagEliminado;

        return $this;
    }

    /**
     * Get pagEliminado
     *
     * @return integer
     */
    public function getPagEliminado()
    {
        return $this->pagEliminado;
    }

    /**
     * Set pagFechaRegistro
     *
     * @param \DateTime $pagFechaRegistro
     *
     * @return CmsPagina
     */
    public function setPagFechaRegistro($pagFechaRegistro)
    {
        $this->pagFechaRegistro = $pagFechaRegistro;

        return $this;
    }

    /**
     * Get pagFechaRegistro
     *
     * @return \DateTime
     */
    public function getPagFechaRegistro()
    {
        return $this->pagFechaRegistro;
    }

    /**
     * Set pagComentario
     *
     * @param string $pagComentario
     *
     * @return CmsPagina
     */
    public function setPagComentario($pagComentario)
    {
        $this->pagComentario = $pagComentario;

        return $this;
    }

    /**
     * Get pagComentario
     *
     * @return string
     */
    public function getPagComentario()
    {
        return $this->pagComentario;
    }
}
