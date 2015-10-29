<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estado
 *
 * @ORM\Table(name="tb_estado")
 * @ORM\Entity(repositoryClass="Application\Entity\EstadoRepository")
 */
class Estado
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_estado", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEstado;

    /**
     * @var string
     *
     * @ORM\Column(name="uf_estado", type="string", length=10, nullable=false)
     */
    private $ufEstado;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_estado", type="string", length=20, nullable=false)
     */
    private $nomeEstado;



    /**
     * Get idEstado
     *
     * @return integer 
     */
    public function getIdEstado()
    {
        return $this->idEstado;
    }

    /**
     * Set ufEstado
     *
     * @param string $ufEstado
     * @return TbEstado
     */
    public function setUfEstado($ufEstado)
    {
        $this->ufEstado = $ufEstado;
    
        return $this;
    }

    /**
     * Get ufEstado
     *
     * @return string 
     */
    public function getUfEstado()
    {
        return $this->ufEstado;
    }

    /**
     * Set nomeEstado
     *
     * @param string $nomeEstado
     * @return TbEstado
     */
    public function setNomeEstado($nomeEstado)
    {
        $this->nomeEstado = $nomeEstado;
    
        return $this;
    }

    /**
     * Get nomeEstado
     *
     * @return string 
     */
    public function getNomeEstado()
    {
        return $this->nomeEstado;
    }
}
