<?php
/**
 * Created by PhpStorm.
 * User: matheuslucio
 * Date: 25/10/15
 * Time: 18:00
 */

namespace Application\Controller;

use Zend\View\Model\ViewModel;

/**
 * Class UsuarioController
 * @package Application\Service
 */
class UsuarioController extends AbstractController
{
    /**
     * Rota inicial da controller usuarios
     *
     * @return array|ViewModel
     */
    public function indexAction()
    {
        $usuarios = $this->getService()->findAll();
        $view = new ViewModel(array('usuarios' => $usuarios));
        return $view;
    }

    /**
     * Rota para cadastrar um usuario
     *
     * @return ViewModel
     */
    public function cadastroAction()
    {
        $view = new ViewModel();

        if ($this->isPost()) {
            $arrPost = $this->getPost();
            $insereUsuario = $this->getService()->insereUsuario($arrPost);

            if ($insereUsuario == true) {
                $view->setVariable('mensagem', 'Usuário cadastrado com sucesso.');
            }
        }

        return $view;
    }

    /**
     * Rota para editar um usuario
     *
     * @return ViewModel
     */
    public function editaAction()
    {
        $arrParam = $this->getParams();
        $view = new ViewModel(array('usuario' => $this->getService()->find($arrParam['id'])));

        if ($this->isPost()) {
            $arrPost = $this->getPost();
            $insereUsuario = $this->getService()->editaUsuario($arrPost, $arrParam['id']);

            if ($insereUsuario == true) {
                $view->setVariable('mensagem', 'Usuário atualizado com sucesso.');
            }
        }

        return $view;
    }

    /**
     * Rota para deletar um usuario
     *
     * @return ViewModel
     */
    public function deletaAction()
    {
        $response = $this->getResponse();
        $response->setStatusCode(200);
        $response->setContent(null);
        $arrParam = $this->getParams();
        $deletaUsuario = $this->getService()->deletaUsuario($arrParam['id']);

        if ($deletaUsuario == true) {
            $this->redirect()->toRoute('usuario');
        }

        return $response;
    }
} 