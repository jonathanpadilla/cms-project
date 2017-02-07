<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsTexto
 *
 * @ORM\Table(name="cms_texto", indexes={@ORM\Index(name="tex_section_fk", columns={"tex_section_fk"})})
 * @ORM\Entity
 */
class CmsTexto
{
    /**
     * @var integer
     *
     * @ORM\Column(name="tex_id_pk", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $texIdPk;

    /**
     * @var string
     *
     * @ORM\Column(name="tex_texto", type="text", length=65535, nullable=true)
     */
    private $texTexto;

    /**
     * @var integer
     *
     * @ORM\Column(name="tex_tipo", type="integer", nullable=true)
     */
    private $texTipo;

    /**
     * @var integer
     *
     * @ORM\Column(name="tex_max", type="integer", nullable=true)
     */
    private $texMax;

    /**
     * @var integer
     *
     * @ORM\Column(name="tex_min", type="integer", nullable=true)
     */
    private $texMin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="tex_fecha_actualizacion", type="datetime", nullable=true)
     */
    private $texFechaActualizacion;

    /**
     * @var string
     *
     * @ORM\Column(name="comentario", type="text", length=65535, nullable=true)
     */
    private $comentario;

    /**
     * @var \CmsSeccion
     *
     * @ORM\ManyToOne(targetEntity="CmsSeccion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tex_section_fk", referencedColumnName="sec_id_pk")
     * })
     */
    private $texSectionFk;



    /**
     * Get texIdPk
     *
     * @return integer
     */
    public function getTexIdPk()
    {
        return $this->texIdPk;
    }

    /**
     * Set texTexto
     *
     * @param string $texTexto
     *
     * @return CmsTexto
     */
    public function setTexTexto($texTexto)
    {
        $this->texTexto = $texTexto;

        return $this;
    }

    /**
     * Get texTexto
     *
     * @return string
     */
    public function getTexTexto()
    {
        return $this->texTexto;
    }

    /**
     * Set texTipo
     *
     * @param integer $texTipo
     *
     * @return CmsTexto
     */
    public function setTexTipo($texTipo)
    {
        $this->texTipo = $texTipo;

        return $this;
    }

    /**
     * Get texTipo
     *
     * @return integer
     */
    public function getTexTipo()
    {
        return $this->texTipo;
    }

    /**
     * Set texMax
     *
     * @param integer $texMax
     *
     * @return CmsTexto
     */
    public function setTexMax($texMax)
    {
        $this->texMax = $texMax;

        return $this;
    }

    /**
     * Get texMax
     *
     * @return integer
     */
    public function getTexMax()
    {
        return $this->texMax;
    }

    /**
     * Set texMin
     *
     * @param integer $texMin
     *
     * @return CmsTexto
     */
    public function setTexMin($texMin)
    {
        $this->texMin = $texMin;

        return $this;
    }

    /**
     * Get texMin
     *
     * @return integer
     */
    public function getTexMin()
    {
        return $this->texMin;
    }

    /**
     * Set texFechaActualizacion
     *
     * @param \DateTime $texFechaActualizacion
     *
     * @return CmsTexto
     */
    public function setTexFechaActualizacion($texFechaActualizacion)
    {
        $this->texFechaActualizacion = $texFechaActualizacion;

        return $this;
    }

    /**
     * Get texFechaActualizacion
     *
     * @return \DateTime
     */
    public function getTexFechaActualizacion()
    {
        return $this->texFechaActualizacion;
    }

    /**
     * Set comentario
     *
     * @param string $comentario
     *
     * @return CmsTexto
     */
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;

        return $this;
    }

    /**
     * Get comentario
     *
     * @return string
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * Set texSectionFk
     *
     * @param \AdminBundle\Entity\CmsSeccion $texSectionFk
     *
     * @return CmsTexto
     */
    public function setTexSectionFk(\AdminBundle\Entity\CmsSeccion $texSectionFk = null)
    {
        $this->texSectionFk = $texSectionFk;

        return $this;
    }

    /**
     * Get texSectionFk
     *
     * @return \AdminBundle\Entity\CmsSeccion
     */
    public function getTexSectionFk()
    {
        return $this->texSectionFk;
    }
}
