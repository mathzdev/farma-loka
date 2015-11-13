<?php
/**
 * Created by PhpStorm.
 * User: matheuslucio
 * Date: 24/10/15
 * Time: 19:36
 */

namespace Application\Service;

/**
 * Class Pedido
 * @package Application\Service
 */
class Pedido extends AbstractService
{
    /**
     * Insere um pedido no sistema
     *
     * @param $arrParam
     */
    public function inserePedido($arrParam)
    {
        $arrInsert = array();
        $arrProdutos = array();
        $arrPrecos = array();
        $arrUnionPrice = array();
        $qtdProdutos = $arrParam['produtos_numero'];

        unset($arrParam['produtos_numero']);

        for ($i = 1; $i <= $qtdProdutos; $i++) {
            if (strlen($arrParam['produtos_pedido_' . $i]) > 0 && strlen($arrParam['qtd_produto_' . $i]) > 0) {
                $arrProdutos[] = array('idProduto' => $arrParam['produtos_pedido_' . $i], 'qtdProduto' => $arrParam['qtd_produto_' . $i]);
                $arrPrecos[] = array('preco' => $this->getRepository('Application\Entity\Produto')->find($arrParam['produtos_pedido_' . $i])->getValorProduto(), 'qtd' => $arrParam['qtd_produto_' . $i]);
                unset($arrParam['produtos_pedido_' . $i]);
                unset($arrParam['qtd_produto_' . $i]);
            } else {
                unset($arrParam['produtos_pedido_' . $i]);
                unset($arrParam['qtd_produto_' . $i]);
            }
        }

        $arrParam['produtos_pedido'] = json_encode($arrProdutos);

        foreach ($arrPrecos as $key => $value) {
            $arrUnionPrice[] = str_replace(',', '.', $value['preco']) * $value['qtd'];
        }

        $arrParam['valor_pedido'] = str_replace('.', ',', array_sum($arrUnionPrice));

        foreach ($arrParam as $key => $param) {
            $arrInsert[$this->camelize($key)] = $param;
        }

        $entidade = $this->getEntity();

        try {
            $entidade->setObsPedido($arrInsert['obsPedido']);
            $entidade->setClientePedido($arrInsert['clientePedido']);
            $entidade->setAtendentePedido($arrInsert['atendentePedido']);
            $entidade->setCaixaPedido($arrInsert['caixaPedido']);
            $entidade->setGerentePedido($arrInsert['gerentePedido']);
            $entidade->setEntregadorPedido($arrInsert['entregadorPedido']);
            $entidade->setProdutosPedido($arrInsert['produtosPedido']);
            $entidade->setValorPedido($arrInsert['valorPedido']);
            $entidade->setDtPedido(time());
            $entidade->setStatusPedido(1);
            $this->getEntityManager()->persist($entidade);
            $this->getEntityManager()->flush();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
    /**
     * Cancela um pedido aberto no sistema
     *
     * @param $idPedido
     * @return bool
     */
    public function cancelaPedido($idPedido)
    {
        $entidade = $this->find($idPedido);

        try {
            $entidade->setStatusPedido(2);
            $this->getEntityManager()->persist($entidade);
            $this->getEntityManager()->flush();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Ativa um pedido aberto no sistema
     *
     * @param $idPedido
     * @return bool
     */
    public function ativaPedido($idPedido)
    {
        $entidade = $this->find($idPedido);

        try {
            $entidade->setStatusPedido(1);
            $this->getEntityManager()->persist($entidade);
            $this->getEntityManager()->flush();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}