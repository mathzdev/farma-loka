<?php
/**
 * Created by PhpStorm.
 * User: matheuslucio
 * Date: 23/10/15
 * Time: 21:59
 */

namespace Application\Controller;

use Zend\View\Model\ViewModel;

/**
 * Class AutenticacaoController
 * @package Application\Controller
 */
class AutenticacaoController extends AbstractController
{
    /**
     * Rota inicial da controller autenticacao
     *
     * @return array|\Zend\Stdlib\ResponseInterface
     */
    public function indexAction()
    {
        $response = $this->getResponse();
        $response->setStatusCode(200);
        $response->setContent(null);

        $sessionUser = $this->getUserSession();

        if ($sessionUser->logado == true) {
            $this->redirect()->toRoute('home');
        } else {
            $this->redirect()->toUrl('/autenticacao/login');
        }

        return $response;
    }

    /**
     * Rota para o usuario realizar login
     *
     * @return ViewModel
     */
    public function loginAction()
    {
        $result = new ViewModel(array('titulo' => 'Farma Loka # Login'));
        $result->setTerminal(true);

        if ($this->isPost()) {
            $arrPost = $this->getPost();
            $existeUsuario = $this->getService('Application\Service\Usuario')->existeUsuario(array('email_usuario' => $arrPost['email'], 'senha_usuario' => $arrPost['senha']));

            if ($existeUsuario) {
                $this->getUserSession()->logado = true;
                $this->getUserSession()->usuario = $this->getService('Application\Service\Usuario')->usuarioLogado(array('email_usuario' => $arrPost['email'], 'senha_usuario' => $arrPost['senha']));
            } else {
                $result->setVariable('mensagem', 'Usuário ou senha não localizados em nosso sistema.');
                $this->getUserSession()->logado = false;
            }
        }

        if ($this->getUserSession()->logado == true) {
            $this->redirect()->toRoute('home');
        }

        return $result;
    }

    /**
     * Rota para o usuario realizar logout
     */
    public function logoutAction()
    {
        $response = $this->getResponse();
        $response->setStatusCode(200);
        $response->setContent(null);

        $this->getUserSession()->logado = false;
        $this->getUserSession()->usuario = array();
        $this->redirect()->toRoute('autenticacao');
    }
}
