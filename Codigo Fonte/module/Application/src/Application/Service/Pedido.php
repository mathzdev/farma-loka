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