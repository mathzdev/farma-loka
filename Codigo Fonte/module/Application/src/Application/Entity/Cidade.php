<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cidade
 *
 * @ORM\Table(name="tb_cidade", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id_cidade"})})
 * @ORM\Entity(repositoryClass="Application\Entity\CidadeRepository")
 */
class Cidade
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_cidade", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCidade;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_estado", type="integer", nullable=false)
     */
    private $idEstado;

    /**
     * @var string
     *
     * @ORM\Column(name="uf_cidade", type="string", length=4, nullable=false)
     */
    private $ufCidade;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_cidade", type="string", length=50, nullable=false)
     */
    private $nomeCidade;



    /**
     * Get idCidade
     *
     * @return integer 
     */
    public function getIdCidade()
    {
        return $this->idCidade;
    }

    /**
     * Set idEstado
     *
     * @param integer $idEstado
     * @return TbCidade
     */
    public function setIdEstado($idEstado)
    {
        $this->idEstado = $idEstado;
    
        return $this;
    }

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
     * Set ufCidade
     *
     * @param string $ufCidade
     * @return TbCidade
     */
    public function setUfCidade($ufCidade)
    {
        $this->ufCidade = $ufCidade;
    
        return $this;
    }

    /**
     * Get ufCidade
     *
     * @return string 
     */
    public function getUfCidade()
    {
        return $this->ufCidade;
    }

    /**
     * Set nomeCidade
     *
     * @param string $nomeCidade
     * @return TbCidade
     */
    public function setNomeCidade($nomeCidade)
    {
        $this->nomeCidade = $nomeCidade;
    
        return $this;
    }

    /**
     * Get nomeCidade
     *
     * @return string 
     */
    public function getNomeCidade()
    {
        return $this->nomeCidade;
    }
}
