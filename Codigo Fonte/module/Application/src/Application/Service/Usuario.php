<?php
/**
 * Created by PhpStorm.
 * User: matheuslucio
 * Date: 24/10/15
 * Time: 19:36
 */

namespace Application\Service;

/**
 * Class Usuario
 * @package Application\Service
 */
class Usuario extends AbstractService
{
    /**
     * Valida se esse usuario e senha existem no banco
     *
     * @param $arrParam
     *
     * @return boolean
     */
    public function existeUsuario($arrParam)
    {
        $arrFind = array();

        foreach ($arrParam as $key => $param) {
            $arrFind[$this->camelize($key)] = $param;
        }

        $find = $this->getRepository('Application\Entity\Usuario')->findBy($arrFind);

        if ($find == null) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Retorna dados do usuario para ser salvo na sessao
     *
     * @param $arrParam
     *
     * @return array
     */
    public function usuarioLogado($arrParam)
    {
        $arrFind = array();

        foreach ($arrParam as $key => $param) {
            $arrFind[$this->camelize($key)] = $param;
        }

        $find = $this->getRepository()->findBy($arrFind);

        return array('idUsuario' => reset($find)->getIdUsuario(), 'nomeUsuario' => reset($find)->getNomeUsuario(), 'emailUsuario' => reset($find)->getEmailUsuario());
    }

    /**
     * Insere um usuario no sistema
     *
     * @param $arrParam
     *
     * @return bool
     */
    public function insereUsuario($arrParam)
    {
        $arrInsert = array();

        foreach ($arrParam as $key => $param) {
            $arrInsert[$this->camelize($key)] = $param;
        }

        $entidade = $this->getEntity();

        try {
            $entidade->setNomeUsuario($arrInsert['nomeUsuario']);
            $entidade->setEmailUsuario($arrInsert['emailUsuario']);
            $entidade->setSenhaUsuario($arrInsert['senhaUsuario']);
            $entidade->setStatusUsuario('ativo');
            $this->getEntityManager()->persist($entidade);
            $this->getEntityManager()->flush();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Atualiza um usuario do sistema
     *
     * @param $arrParam
     * @param $idUsuario
     *
     * @return bool
     */
    public function editaUsuario($arrParam, $idUsuario)
    {
        $arrUpdate = array();

        foreach ($arrParam as $key => $param) {
            $arrUpdate[$this->camelize($key)] = $param;
        }

        $entidade = $this->find($idUsuario);

        try {
            $entidade->setNomeUsuario($arrUpdate['nomeUsuario']);
            $entidade->setEmailUsuario($arrUpdate['emailUsuario']);
            $entidade->setSenhaUsuario($arrUpdate['senhaUsuario']);
            $this->getEntityManager()->persist($entidade);
            $this->getEntityManager()->flush();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Deleta um usuario do sistema
     *
     * @param $idUsuario
     *
     * @return bool
     */
    public function deletaUsuario($idUsuario)
    {
        $entidade = $this->getEntityManager()->getReference(get_class($this->getEntity()), $idUsuario);

        try {
            $this->getEntityManager()->remove($entidade);
            $this->getEntityManager()->flush();

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}