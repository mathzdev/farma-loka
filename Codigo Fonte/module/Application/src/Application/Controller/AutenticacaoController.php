<?php
/**
 * Created by PhpStorm.
 * User: matheuslucio
 * Date: 23/10/15
 * Time: 21:59
 */

namespace Application\Controller;

use Zend\Session\Container;
use Zend\View\Model\ViewModel;

class AutenticacaoController extends AbstractController
{
    public function indexAction()
    {
        $response = $this->getResponse();
        $response->setStatusCode(200);
        $response->setContent(null);

        $sessionUser = new Container('user_session');

        if ($sessionUser->logado == true) {
            $this->redirect()->toRoute('home');
        } else {
            $this->redirect()->toUrl('/autenticacao/login');
        }

        return $response;
    }

    public function loginAction()
    {
        $result = new ViewModel(array('titulo' => 'Login - Farma Loka'));
        $result->setTerminal(true);
        $sessionUser = new Container('user_session');

        if ($this->isPost()) {
            $arrPost = $this->getPost();
            $existeUsuario = $this->getService('Application\Service\Usuario')->existeUsuario(array('email_usuario' => $arrPost['email'], 'senha_usuario' => $arrPost['senha']));

            if ($existeUsuario) {
                $sessionUser->logado = true;
                $sessionUser->usuario = $this->getService('Application\Service\Usuario')->usuarioLogado(array('email_usuario' => $arrPost['email'], 'senha_usuario' => $arrPost['senha']));
            } else {
                $result->setVariable('mensagem', 'Usuário ou senha não localizados em nosso sistema.');
                $sessionUser->logado = false;
            }
        }

        if ($sessionUser->logado == true) {
            $this->redirect()->toRoute('home');
        }

        return $result;
    }

    public function logoutAction()
    {
        $sessionUser = new Container('user_session');
        $sessionUser->logado = false;
        $sessionUser->usuario = array();
        $this->redirect()->toRoute('autenticacao');
    }
}
