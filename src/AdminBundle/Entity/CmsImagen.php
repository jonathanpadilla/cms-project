<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsImagen
 *
 * @ORM\Table(name="cms_imagen", indexes={@ORM\Index(name="ima_seccion_fk", columns={"ima_seccion_fk"})})
 * @ORM\Entity
 */
class CmsImagen
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ima_id_pk", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $imaIdPk;

    /**
     * @var string
     *
     * @ORM\Column(name="ima_nombre", type="string", length=100, nullable=true)
     */
    private $imaNombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="ima_alto", type="integer", nullable=true)
     */
    private $imaAlto;

    /**
     * @var integer
     *
     * @ORM\Column(name="ima_ancho", type="integer", nullable=true)
     */
    private $imaAncho;

    /**
     * @var integer
     *
     * @ORM\Column(name="ima_tamano_maximo", type="integer", nullable=true)
     */
    private $imaTamanoMaximo;

    /**
     * @var integer
     *
     * @ORM\Column(name="ima_eliminado", type="integer", nullable=true)
     */
    private $imaEliminado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ima_fecha_registro", type="datetime", nullable=true)
     */
    private $imaFechaRegistro;

    /**
     * @var \CmsSeccion
     *
     * @ORM\ManyToOne(targetEntity="CmsSeccion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ima_seccion_fk", referencedColumnName="sec_id_pk")
     * })
     */
    private $imaSeccionFk;



    /**
     * Get imaIdPk
     *
     * @return integer
     */
    public function getImaIdPk()
    {
        return $this->imaIdPk;
    }

    /**
     * Set imaNombre
     *
     * @param string $imaNombre
     *
     * @return CmsImagen
     */
    public function setImaNombre($imaNombre)
    {
        $this->imaNombre = $imaNombre;

        return $this;
    }

    /**
     * Get imaNombre
     *
     * @return string
     */
    public function getImaNombre()
    {
        return $this->imaNombre;
    }

    /**
     * Set imaAlto
     *
     * @param integer $imaAlto
     *
     * @return CmsImagen
     */
    public function setImaAlto($imaAlto)
    {
        $this->imaAlto = $imaAlto;

        return $this;
    }

    /**
     * Get imaAlto
     *
     * @return integer
     */
    public function getImaAlto()
    {
        return $this->imaAlto;
    }

    /**
     * Set imaAncho
     *
     * @param integer $imaAncho
     *
     * @return CmsImagen
     */
    public function setImaAncho($imaAncho)
    {
        $this->imaAncho = $imaAncho;

        return $this;
    }

    /**
     * Get imaAncho
     *
     * @return integer
     */
    public function getImaAncho()
    {
        return $this->imaAncho;
    }

    /**
     * Set imaTamanoMaximo
     *
     * @param integer $imaTamanoMaximo
     *
     * @return CmsImagen
     */
    public function setImaTamanoMaximo($imaTamanoMaximo)
    {
        $this->imaTamanoMaximo = $imaTamanoMaximo;

        return $this;
    }

    /**
     * Get imaTamanoMaximo
     *
     * @return integer
     */
    public function getImaTamanoMaximo()
    {
        return $this->imaTamanoMaximo;
    }

    /**
     * Set imaEliminado
     *
     * @param integer $imaEliminado
     *
     * @return CmsImagen
     */
    public function setImaEliminado($imaEliminado)
    {
        $this->imaEliminado = $imaEliminado;

        return $this;
    }

    /**
     * Get imaEliminado
     *
     * @return integer
     */
    public function getImaEliminado()
    {
        return $this->imaEliminado;
    }

    /**
     * Set imaFechaRegistro
     *
     * @param \DateTime $imaFechaRegistro
     *
     * @return CmsImagen
     */
    public function setImaFechaRegistro($imaFechaRegistro)
    {
        $this->imaFechaRegistro = $imaFechaRegistro;

        return $this;
    }

    /**
     * Get imaFechaRegistro
     *
     * @return \DateTime
     */
    public function getImaFechaRegistro()
    {
        return $this->imaFechaRegistro;
    }

    /**
     * Set imaSeccionFk
     *
     * @param \AdminBundle\Entity\CmsSeccion $imaSeccionFk
     *
     * @return CmsImagen
     */
    public function setImaSeccionFk(\AdminBundle\Entity\CmsSeccion $imaSeccionFk = null)
    {
        $this->imaSeccionFk = $imaSeccionFk;

        return $this;
    }

    /**
     * Get imaSeccionFk
     *
     * @return \AdminBundle\Entity\CmsSeccion
     */
    public function getImaSeccionFk()
    {
        return $this->imaSeccionFk;
    }
}
