<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsParametros
 *
 * @ORM\Table(name="cms_parametros", indexes={@ORM\Index(name="par_pagina_fk", columns={"par_bloque_fk"})})
 * @ORM\Entity
 */
class CmsParametros
{
    /**
     * @var integer
     *
     * @ORM\Column(name="par_id_pk", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $parIdPk;

    /**
     * @var string
     *
     * @ORM\Column(name="par_nombre", type="string", length=100, nullable=true)
     */
    private $parNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="par_valor", type="text", length=65535, nullable=true)
     */
    private $parValor;

    /**
     * @var integer
     *
     * @ORM\Column(name="par_visible", type="integer", nullable=true)
     */
    private $parVisible;

    /**
     * @var \CmsBloque
     *
     * @ORM\ManyToOne(targetEntity="CmsBloque")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="par_bloque_fk", referencedColumnName="blo_id_pk")
     * })
     */
    private $parBloqueFk;



    /**
     * Get parIdPk
     *
     * @return integer
     */
    public function getParIdPk()
    {
        return $this->parIdPk;
    }

    /**
     * Set parNombre
     *
     * @param string $parNombre
     *
     * @return CmsParametros
     */
    public function setParNombre($parNombre)
    {
        $this->parNombre = $parNombre;

        return $this;
    }

    /**
     * Get parNombre
     *
     * @return string
     */
    public function getParNombre()
    {
        return $this->parNombre;
    }

    /**
     * Set parValor
     *
     * @param string $parValor
     *
     * @return CmsParametros
     */
    public function setParValor($parValor)
    {
        $this->parValor = $parValor;

        return $this;
    }

    /**
     * Get parValor
     *
     * @return string
     */
    public function getParValor()
    {
        return $this->parValor;
    }

    /**
     * Set parVisible
     *
     * @param integer $parVisible
     *
     * @return CmsParametros
     */
    public function setParVisible($parVisible)
    {
        $this->parVisible = $parVisible;

        return $this;
    }

    /**
     * Get parVisible
     *
     * @return integer
     */
    public function getParVisible()
    {
        return $this->parVisible;
    }

    /**
     * Set parBloqueFk
     *
     * @param \AdminBundle\Entity\CmsBloque $parBloqueFk
     *
     * @return CmsParametros
     */
    public function setParBloqueFk(\AdminBundle\Entity\CmsBloque $parBloqueFk = null)
    {
        $this->parBloqueFk = $parBloqueFk;

        return $this;
    }

    /**
     * Get parBloqueFk
     *
     * @return \AdminBundle\Entity\CmsBloque
     */
    public function getParBloqueFk()
    {
        return $this->parBloqueFk;
    }
}
