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

    /**
     * Retorna o corpo html do email para a rota esqueci minha senha
     *
     * @param $user
     * @return string
     */
    public function getCorpoEmailEsqueciSenha($user)
    {
        $corpoEmail = '';
        $corpoEmail .= '<p><a href="http://farmaloka.cf/" target="_blank"><img alt="" src="https://trello-attachments.s3.amazonaws.com/561eb595cab6bb5a01531e0c/775x150/7a207d50c947327c27f63191d64065da/logoFarmaLoka.png" style="height:75px; width:388px" /></a></p>';
        $corpoEmail .= '<p><span style="font-size:16px">Ol&aacute; <strong>' . $user->getNomeUsuario() . '</strong>, voc&ecirc; esqueceu sua senha n&eacute;? kkk...</span></p>';
        $corpoEmail .= '<p><span style="font-size:16px">Tudo bem ok, demos um jeito e recuperamos ela rapidinho :D</span></p>';
        $corpoEmail .= '<p><span style="font-size:16px">Aqui est&atilde;o seus dados:</span></p>';
        $corpoEmail .= '<p><span style="font-size:16px"><strong>E-mail:</strong> ' . $user->getEmailUsuario() . '</span></p>';
        $corpoEmail .= '<p><span style="font-size:16px"><strong>Senha:</strong> ' . $user->getSenhaUsuario() . '</span></p>';
        $corpoEmail .= '<p>Continue utilizando nosso sistema ok? ;)</p>';
        $corpoEmail .= '<p><a href="http://farmaloka.cf/" target="_blank">http://farmaloka.cf/</a></p>';
        $corpoEmail .= '<hr />';
        $corpoEmail .= '<p><em>Aten&ccedil;&atilde;o, este &eacute; um e-mail autom&aacute;tico, favor n&atilde;o responder. Obrigado, Farma Loka System&#39;s.</em></p>';

        return $corpoEmail;
    }
}