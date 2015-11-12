<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pedido
 *
 * @ORM\Table(name="tb_pedido")
 * @ORM\Entity(repositoryClass="Application\Entity\PedidoRepository")
 */
class Pedido
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_pedido", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPedido;

    /**
     * @var string
     *
     * @ORM\Column(name="obs_pedido", type="text", nullable=false)
     */
    private $obsPedido;

    /**
     * @var integer
     *
     * @ORM\Column(name="cliente_pedido", type="integer", nullable=false)
     */
    private $clientePedido;

    /**
     * @var integer
     *
     * @ORM\Column(name="atendente_pedido", type="integer", nullable=false)
     */
    private $atendentePedido;

    /**
     * @var integer
     *
     * @ORM\Column(name="caixa_pedido", type="integer", nullable=false)
     */
    private $caixaPedido;

    /**
     * @var integer
     *
     * @ORM\Column(name="gerente_pedido", type="integer", nullable=false)
     */
    private $gerentePedido;

    /**
     * @var integer
     *
     * @ORM\Column(name="entregador_pedido", type="integer", nullable=false)
     */
    private $entregadorPedido;

    /**
     * @var string
     *
     * @ORM\Column(name="produtos_pedido", type="text", nullable=false)
     */
    private $produtosPedido;

    /**
     * @var string
     *
     * @ORM\Column(name="valor_pedido", type="string", length=200, nullable=false)
     */
    private $valorPedido;

    /**
     * @var integer
     *
     * @ORM\Column(name="dt_pedido", type="integer", nullable=false)
     */
    private $dtPedido;

    /**
     * @var integer
     *
     * @ORM\Column(name="status_pedido", type="integer", nullable=false)
     */
    private $statusPedido;



    /**
     * Get idPedido
     *
     * @return integer
     */
    public function getIdPedido()
    {
        return $this->idPedido;
    }

    /**
     * Set obsPedido
     *
     * @param string $obsPedido
     * @return TbPedido
     */
    public function setObsPedido($obsPedido)
    {
        $this->obsPedido = $obsPedido;

        return $this;
    }

    /**
     * Get obsPedido
     *
     * @return string
     */
    public function getObsPedido()
    {
        return $this->obsPedido;
    }

    /**
     * Set clientePedido
     *
     * @param integer $clientePedido
     * @return TbPedido
     */
    public function setClientePedido($clientePedido)
    {
        $this->clientePedido = $clientePedido;

        return $this;
    }

    /**
     * Get clientePedido
     *
     * @return integer
     */
    public function getClientePedido()
    {
        return $this->clientePedido;
    }

    /**
     * Set atendentePedido
     *
     * @param integer $atendentePedido
     * @return TbPedido
     */
    public function setAtendentePedido($atendentePedido)
    {
        $this->atendentePedido = $atendentePedido;

        return $this;
    }

    /**
     * Get atendentePedido
     *
     * @return integer
     */
    public function getAtendentePedido()
    {
        return $this->atendentePedido;
    }

    /**
     * Set caixaPedido
     *
     * @param integer $caixaPedido
     * @return TbPedido
     */
    public function setCaixaPedido($caixaPedido)
    {
        $this->caixaPedido = $caixaPedido;

        return $this;
    }

    /**
     * Get caixaPedido
     *
     * @return integer
     */
    public function getCaixaPedido()
    {
        return $this->caixaPedido;
    }

    /**
     * Set gerentePedido
     *
     * @param integer $gerentePedido
     * @return TbPedido
     */
    public function setGerentePedido($gerentePedido)
    {
        $this->gerentePedido = $gerentePedido;

        return $this;
    }

    /**
     * Get gerentePedido
     *
     * @return integer
     */
    public function getGerentePedido()
    {
        return $this->gerentePedido;
    }

    /**
     * Set entregadorPedido
     *
     * @param integer $entregadorPedido
     * @return TbPedido
     */
    public function setEntregadorPedido($entregadorPedido)
    {
        $this->entregadorPedido = $entregadorPedido;

        return $this;
    }

    /**
     * Get entregadorPedido
     *
     * @return integer
     */
    public function getEntregadorPedido()
    {
        return $this->entregadorPedido;
    }

    /**
     * Set produtosPedido
     *
     * @param string $produtosPedido
     * @return TbPedido
     */
    public function setProdutosPedido($produtosPedido)
    {
        $this->produtosPedido = $produtosPedido;

        return $this;
    }

    /**
     * Get produtosPedido
     *
     * @return string
     */
    public function getProdutosPedido()
    {
        return $this->produtosPedido;
    }

    /**
     * Set valorPedido
     *
     * @param string $valorPedido
     * @return TbPedido
     */
    public function setValorPedido($valorPedido)
    {
        $this->valorPedido = $valorPedido;

        return $this;
    }

    /**
     * Get valorPedido
     *
     * @return string
     */
    public function getValorPedido()
    {
        return $this->valorPedido;
    }

    /**
     * Set dtPedido
     *
     * @param integer $dtPedido
     * @return TbPedido
     */
    public function setDtPedido($dtPedido)
    {
        $this->dtPedido = $dtPedido;

        return $this;
    }

    /**
     * Get dtPedido
     *
     * @return integer
     */
    public function getDtPedido()
    {
        return $this->dtPedido;
    }

    /**
     * Set statusPedido
     *
     * @param integer $statusPedido
     * @return TbPedido
     */
    public function setStatusPedido($statusPedido)
    {
        $this->statusPedido = $statusPedido;

        return $this;
    }

    /**
     * Get statusPedido
     *
     * @return integer
     */
    public function getStatusPedido()
    {
        return $this->statusPedido;
    }
}
