<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsSeccion
 *
 * @ORM\Table(name="cms_seccion", indexes={@ORM\Index(name="sec_bloque_fk", columns={"sec_bloque_fk"}), @ORM\Index(name="sec_parent_fk", columns={"sec_parent_fk"})})
 * @ORM\Entity
 */
class CmsSeccion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="sec_id_pk", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $secIdPk;

    /**
     * @var string
     *
     * @ORM\Column(name="sec_nombre", type="string", length=100, nullable=true)
     */
    private $secNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="sec_texto", type="text", length=65535, nullable=true)
     */
    private $secTexto;

    /**
     * @var integer
     *
     * @ORM\Column(name="sec_orden", type="integer", nullable=true)
     */
    private $secOrden;

    /**
     * @var integer
     *
     * @ORM\Column(name="sec_tipo", type="integer", nullable=true)
     */
    private $secTipo;

    /**
     * @var integer
     *
     * @ORM\Column(name="sec_eliminado", type="integer", nullable=true)
     */
    private $secEliminado;

    /**
     * @var \CmsBloque
     *
     * @ORM\ManyToOne(targetEntity="CmsBloque")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sec_bloque_fk", referencedColumnName="blo_id_pk")
     * })
     */
    private $secBloqueFk;

    /**
     * @var \CmsSeccion
     *
     * @ORM\ManyToOne(targetEntity="CmsSeccion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sec_parent_fk", referencedColumnName="sec_id_pk")
     * })
     */
    private $secParentFk;



    /**
     * Get secIdPk
     *
     * @return integer
     */
    public function getSecIdPk()
    {
        return $this->secIdPk;
    }

    /**
     * Set secNombre
     *
     * @param string $secNombre
     *
     * @return CmsSeccion
     */
    public function setSecNombre($secNombre)
    {
        $this->secNombre = $secNombre;

        return $this;
    }

    /**
     * Get secNombre
     *
     * @return string
     */
    public function getSecNombre()
    {
        return $this->secNombre;
    }

    /**
     * Set secTexto
     *
     * @param string $secTexto
     *
     * @return CmsSeccion
     */
    public function setSecTexto($secTexto)
    {
        $this->secTexto = $secTexto;

        return $this;
    }

    /**
     * Get secTexto
     *
     * @return string
     */
    public function getSecTexto()
    {
        return $this->secTexto;
    }

    /**
     * Set secOrden
     *
     * @param integer $secOrden
     *
     * @return CmsSeccion
     */
    public function setSecOrden($secOrden)
    {
        $this->secOrden = $secOrden;

        return $this;
    }

    /**
     * Get secOrden
     *
     * @return integer
     */
    public function getSecOrden()
    {
        return $this->secOrden;
    }

    /**
     * Set secTipo
     *
     * @param integer $secTipo
     *
     * @return CmsSeccion
     */
    public function setSecTipo($secTipo)
    {
        $this->secTipo = $secTipo;

        return $this;
    }

    /**
     * Get secTipo
     *
     * @return integer
     */
    public function getSecTipo()
    {
        return $this->secTipo;
    }

    /**
     * Set secEliminado
     *
     * @param integer $secEliminado
     *
     * @return CmsSeccion
     */
    public function setSecEliminado($secEliminado)
    {
        $this->secEliminado = $secEliminado;

        return $this;
    }

    /**
     * Get secEliminado
     *
     * @return integer
     */
    public function getSecEliminado()
    {
        return $this->secEliminado;
    }

    /**
     * Set secBloqueFk
     *
     * @param \AdminBundle\Entity\CmsBloque $secBloqueFk
     *
     * @return CmsSeccion
     */
    public function setSecBloqueFk(\AdminBundle\Entity\CmsBloque $secBloqueFk = null)
    {
        $this->secBloqueFk = $secBloqueFk;

        return $this;
    }

    /**
     * Get secBloqueFk
     *
     * @return \AdminBundle\Entity\CmsBloque
     */
    public function getSecBloqueFk()
    {
        return $this->secBloqueFk;
    }

    /**
     * Set secParentFk
     *
     * @param \AdminBundle\Entity\CmsSeccion $secParentFk
     *
     * @return CmsSeccion
     */
    public function setSecParentFk(\AdminBundle\Entity\CmsSeccion $secParentFk = null)
    {
        $this->secParentFk = $secParentFk;

        return $this;
    }

    /**
     * Get secParentFk
     *
     * @return \AdminBundle\Entity\CmsSeccion
     */
    public function getSecParentFk()
    {
        return $this->secParentFk;
    }
}
