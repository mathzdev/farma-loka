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

        $find = $this->getRepository('Application\Entity\TbUsuario')->findBy($arrFind);

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

        $find = $this->getRepository('Application\Entity\TbUsuario')->findBy($arrFind);

        return array('idUsuario' => reset($find)->getIdUsuario(), 'nomeUsuario' => reset($find)->getNomeUsuario(), 'emailUsuario' => reset($find)->getEmailUsuario());
    }
}