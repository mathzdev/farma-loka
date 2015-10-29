<?php
/**
 * Created by PhpStorm.
 * User: matheuslucio
 * Date: 24/10/15
 * Time: 19:36
 */

namespace Application\Service;

/**
 * Class Cliente
 * @package Application\Service
 */
class Cliente extends AbstractService
{
    /**
     * Insere um cliente no sistema
     *
     * @param $arrParam
     * @param $files
     *
     * @return bool
     */
    public function insereCliente($arrParam, $files)
    {
        $arrInsert = array();
        if (count($files['foto_cliente']) > 1 && strlen($files['foto_cliente']['type']) > 1) {
            $diretorioUpload = getcwd() . '/public/data/';
            $nomeFile = md5(time()) . '.' .  explode('/', $files['foto_cliente']['type'])[1];
            $arquivo = $diretorioUpload . $nomeFile;
            if (move_uploaded_file($files['foto_cliente']['tmp_name'], $arquivo)) {
                $arrParam['foto_cliente'] = '/data/' . $nomeFile;
            } else {
                $arrParam['foto_cliente'] = null;
            }
        } else {
            $arrParam['foto_cliente'] = null;
        }

        foreach ($arrParam as $key => $param) {
            $arrInsert[$this->camelize($key)] = $param;
        }

        $entidade = $this->getEntity();

        try {
            $entidade->setNomeCliente($arrInsert['nomeCliente']);
            $entidade->setCpfCliente($arrInsert['cpfCliente']);
            $entidade->setRgCliente($arrInsert['rgCliente']);
            $entidade->setTelefoneCliente($arrInsert['telefoneCliente']);
            $entidade->setCelularCliente($arrInsert['celularCliente']);
            $entidade->setDtNascimentoCliente(strtotime($arrInsert['dtNascimentoCliente']));
            $entidade->setEmailCliente($arrInsert['emailCliente']);
            $entidade->setSexoCliente($arrInsert['sexoCliente']);
            $entidade->setCepCliente($arrInsert['cepCliente']);
            $entidade->setEnderecoCliente($arrInsert['enderecoCliente']);
            $entidade->setNumeroCliente($arrInsert['numeroCliente']);
            $entidade->setComplementoCliente($arrInsert['complementoCliente']);
            $entidade->setCidadeCliente($arrInsert['cidadeCliente']);
            $entidade->setUfCliente($arrInsert['ufCliente']);
            if ($arrInsert['fotoCliente'] != null) {
                $entidade->setFotoCliente($arrInsert['fotoCliente']);
            }
            $entidade->setDtCadastroCliente(time());
            $this->getEntityManager()->persist($entidade);
            $this->getEntityManager()->flush();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Atualiza um cliente do sistema
     *
     * @param $arrParam
     * @param $files
     * @param $idCliente
     *
     * @return bool
     */
    public function editaUsuario($arrParam, $files, $idCliente)
    {
        $arrUpdate = array();

        if (count($files['foto_cliente']) > 1 && strlen($files['foto_cliente']['type']) > 1) {
            $diretorioUpload = getcwd() . '/public/data/';
            $nomeFile = md5(time()) . '.' .  explode('/', $files['foto_cliente']['type'])[1];
            $arquivo = $diretorioUpload . $nomeFile;
            if (move_uploaded_file($files['foto_cliente']['tmp_name'], $arquivo)) {
                $arrParam['foto_cliente'] = '/data/' . $nomeFile;
            } else {
                $arrParam['foto_cliente'] = null;
            }
        } else {
            $arrParam['foto_cliente'] = null;
        }

        foreach ($arrParam as $key => $param) {
            $arrUpdate[$this->camelize($key)] = $param;
        }

        $entidade = $this->find($idCliente);

        try {
            $entidade->setNomeCliente($arrUpdate['nomeCliente']);
            $entidade->setCpfCliente($arrUpdate['cpfCliente']);
            $entidade->setRgCliente($arrUpdate['rgCliente']);
            $entidade->setTelefoneCliente($arrUpdate['telefoneCliente']);
            $entidade->setCelularCliente($arrUpdate['celularCliente']);
            $entidade->setDtNascimentoCliente(strtotime($arrUpdate['dtNascimentoCliente']));
            $entidade->setEmailCliente($arrUpdate['emailCliente']);
            $entidade->setSexoCliente($arrUpdate['sexoCliente']);
            $entidade->setCepCliente($arrUpdate['cepCliente']);
            $entidade->setEnderecoCliente($arrUpdate['enderecoCliente']);
            $entidade->setNumeroCliente($arrUpdate['numeroCliente']);
            $entidade->setComplementoCliente($arrUpdate['complementoCliente']);
            $entidade->setCidadeCliente($arrUpdate['cidadeCliente']);
            $entidade->setUfCliente($arrUpdate['ufCliente']);
            if ($arrUpdate['fotoCliente'] != null) {
                $entidade->setFotoCliente($arrUpdate['fotoCliente']);
            }
            $entidade->setDtCadastroCliente(time());
            $this->getEntityManager()->persist($entidade);
            $this->getEntityManager()->flush();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}