<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produto
 *
 * @ORM\Table(name="tb_produto")
 * @ORM\Entity(repositoryClass="Application\Entity\ProdutoRepository")
 */
class Produto
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_produto", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProduto;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_produto", type="string", length=200, nullable=false)
     */
    private $nomeProduto;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao_produto", type="text", nullable=false)
     */
    private $descricaoProduto;

    /**
     * @var integer
     *
     * @ORM\Column(name="fornecedor_produto", type="integer", nullable=false)
     */
    private $fornecedorProduto;

    /**
     * @var string
     *
     * @ORM\Column(name="valor_produto", type="string", length=20, nullable=false)
     */
    private $valorProduto;

    /**
     * @var string
     *
     * @ORM\Column(name="foto_produto", type="string", length=500, nullable=false)
     */
    private $fotoProduto;



    /**
     * Get idProduto
     *
     * @return integer 
     */
    public function getIdProduto()
    {
        return $this->idProduto;
    }

    /**
     * Set nomeProduto
     *
     * @param string $nomeProduto
     * @return TbProduto
     */
    public function setNomeProduto($nomeProduto)
    {
        $this->nomeProduto = $nomeProduto;
    
        return $this;
    }

    /**
     * Get nomeProduto
     *
     * @return string 
     */
    public function getNomeProduto()
    {
        return $this->nomeProduto;
    }

    /**
     * Set descricaoProduto
     *
     * @param string $descricaoProduto
     * @return TbProduto
     */
    public function setDescricaoProduto($descricaoProduto)
    {
        $this->descricaoProduto = $descricaoProduto;
    
        return $this;
    }

    /**
     * Get descricaoProduto
     *
     * @return string 
     */
    public function getDescricaoProduto()
    {
        return $this->descricaoProduto;
    }

    /**
     * Set fornecedorProduto
     *
     * @param integer $fornecedorProduto
     * @return TbProduto
     */
    public function setFornecedorProduto($fornecedorProduto)
    {
        $this->fornecedorProduto = $fornecedorProduto;
    
        return $this;
    }

    /**
     * Get fornecedorProduto
     *
     * @return integer 
     */
    public function getFornecedorProduto()
    {
        return $this->fornecedorProduto;
    }

    /**
     * Set valorProduto
     *
     * @param string $valorProduto
     * @return TbProduto
     */
    public function setValorProduto($valorProduto)
    {
        $this->valorProduto = $valorProduto;
    
        return $this;
    }

    /**
     * Get valorProduto
     *
     * @return string 
     */
    public function getValorProduto()
    {
        return $this->valorProduto;
    }

    /**
     * Set fotoProduto
     *
     * @param string $fotoProduto
     * @return TbProduto
     */
    public function setFotoProduto($fotoProduto)
    {
        $this->fotoProduto = $fotoProduto;
    
        return $this;
    }

    /**
     * Get fotoProduto
     *
     * @return string 
     */
    public function getFotoProduto()
    {
        return $this->fotoProduto;
    }
}
