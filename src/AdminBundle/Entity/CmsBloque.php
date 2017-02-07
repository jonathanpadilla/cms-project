<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsBloque
 *
 * @ORM\Table(name="cms_bloque", indexes={@ORM\Index(name="blo_pagina_fk", columns={"blo_pagina_fk"}), @ORM\Index(name="blo_tipo_fk", columns={"blo_tipo_fk"})})
 * @ORM\Entity
 */
class CmsBloque
{
    /**
     * @var integer
     *
     * @ORM\Column(name="blo_id_pk", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $bloIdPk;

    /**
     * @var string
     *
     * @ORM\Column(name="blo_nombre", type="string", length=100, nullable=true)
     */
    private $bloNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="blo_controller", type="string", length=100, nullable=true)
     */
    private $bloController;

    /**
     * @var integer
     *
     * @ORM\Column(name="blo_orden", type="integer", nullable=true)
     */
    private $bloOrden;

    /**
     * @var integer
     *
     * @ORM\Column(name="blo_eliminado", type="integer", nullable=true)
     */
    private $bloEliminado;

    /**
     * @var integer
     *
     * @ORM\Column(name="blo_visible", type="integer", nullable=true)
     */
    private $bloVisible;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="blo_fecha_registro", type="datetime", nullable=true)
     */
    private $bloFechaRegistro;

    /**
     * @var string
     *
     * @ORM\Column(name="blo_comentario", type="text", length=65535, nullable=true)
     */
    private $bloComentario;

    /**
     * @var \CmsPagina
     *
     * @ORM\ManyToOne(targetEntity="CmsPagina")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="blo_pagina_fk", referencedColumnName="pag_id_pk")
     * })
     */
    private $bloPaginaFk;

    /**
     * @var \CmsBloqueTipo
     *
     * @ORM\ManyToOne(targetEntity="CmsBloqueTipo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="blo_tipo_fk", referencedColumnName="bti_id_pk")
     * })
     */
    private $bloTipoFk;



    /**
     * Get bloIdPk
     *
     * @return integer
     */
    public function getBloIdPk()
    {
        return $this->bloIdPk;
    }

    /**
     * Set bloNombre
     *
     * @param string $bloNombre
     *
     * @return CmsBloque
     */
    public function setBloNombre($bloNombre)
    {
        $this->bloNombre = $bloNombre;

        return $this;
    }

    /**
     * Get bloNombre
     *
     * @return string
     */
    public function getBloNombre()
    {
        return $this->bloNombre;
    }

    /**
     * Set bloController
     *
     * @param string $bloController
     *
     * @return CmsBloque
     */
    public function setBloController($bloController)
    {
        $this->bloController = $bloController;

        return $this;
    }

    /**
     * Get bloController
     *
     * @return string
     */
    public function getBloController()
    {
        return $this->bloController;
    }

    /**
     * Set bloOrden
     *
     * @param integer $bloOrden
     *
     * @return CmsBloque
     */
    public function setBloOrden($bloOrden)
    {
        $this->bloOrden = $bloOrden;

        return $this;
    }

    /**
     * Get bloOrden
     *
     * @return integer
     */
    public function getBloOrden()
    {
        return $this->bloOrden;
    }

    /**
     * Set bloEliminado
     *
     * @param integer $bloEliminado
     *
     * @return CmsBloque
     */
    public function setBloEliminado($bloEliminado)
    {
        $this->bloEliminado = $bloEliminado;

        return $this;
    }

    /**
     * Get bloEliminado
     *
     * @return integer
     */
    public function getBloEliminado()
    {
        return $this->bloEliminado;
    }

    /**
     * Set bloVisible
     *
     * @param integer $bloVisible
     *
     * @return CmsBloque
     */
    public function setBloVisible($bloVisible)
    {
        $this->bloVisible = $bloVisible;

        return $this;
    }

    /**
     * Get bloVisible
     *
     * @return integer
     */
    public function getBloVisible()
    {
        return $this->bloVisible;
    }

    /**
     * Set bloFechaRegistro
     *
     * @param \DateTime $bloFechaRegistro
     *
     * @return CmsBloque
     */
    public function setBloFechaRegistro($bloFechaRegistro)
    {
        $this->bloFechaRegistro = $bloFechaRegistro;

        return $this;
    }

    /**
     * Get bloFechaRegistro
     *
     * @return \DateTime
     */
    public function getBloFechaRegistro()
    {
        return $this->bloFechaRegistro;
    }

    /**
     * Set bloComentario
     *
     * @param string $bloComentario
     *
     * @return CmsBloque
     */
    public function setBloComentario($bloComentario)
    {
        $this->bloComentario = $bloComentario;

        return $this;
    }

    /**
     * Get bloComentario
     *
     * @return string
     */
    public function getBloComentario()
    {
        return $this->bloComentario;
    }

    /**
     * Set bloPaginaFk
     *
     * @param \AdminBundle\Entity\CmsPagina $bloPaginaFk
     *
     * @return CmsBloque
     */
    public function setBloPaginaFk(\AdminBundle\Entity\CmsPagina $bloPaginaFk = null)
    {
        $this->bloPaginaFk = $bloPaginaFk;

        return $this;
    }

    /**
     * Get bloPaginaFk
     *
     * @return \AdminBundle\Entity\CmsPagina
     */
    public function getBloPaginaFk()
    {
        return $this->bloPaginaFk;
    }

    /**
     * Set bloTipoFk
     *
     * @param \AdminBundle\Entity\CmsBloqueTipo $bloTipoFk
     *
     * @return CmsBloque
     */
    public function setBloTipoFk(\AdminBundle\Entity\CmsBloqueTipo $bloTipoFk = null)
    {
        $this->bloTipoFk = $bloTipoFk;

        return $this;
    }

    /**
     * Get bloTipoFk
     *
     * @return \AdminBundle\Entity\CmsBloqueTipo
     */
    public function getBloTipoFk()
    {
        return $this->bloTipoFk;
    }
}
