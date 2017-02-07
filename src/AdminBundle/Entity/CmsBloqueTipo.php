<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsBloqueTipo
 *
 * @ORM\Table(name="cms_bloque_tipo")
 * @ORM\Entity
 */
class CmsBloqueTipo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="bti_id_pk", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $btiIdPk;

    /**
     * @var string
     *
     * @ORM\Column(name="bti_nombre", type="string", length=100, nullable=true)
     */
    private $btiNombre;



    /**
     * Get btiIdPk
     *
     * @return integer
     */
    public function getBtiIdPk()
    {
        return $this->btiIdPk;
    }

    /**
     * Set btiNombre
     *
     * @param string $btiNombre
     *
     * @return CmsBloqueTipo
     */
    public function setBtiNombre($btiNombre)
    {
        $this->btiNombre = $btiNombre;

        return $this;
    }

    /**
     * Get btiNombre
     *
     * @return string
     */
    public function getBtiNombre()
    {
        return $this->btiNombre;
    }
}
