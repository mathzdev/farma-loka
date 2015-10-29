<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\View\Model\ViewModel;

/**
 * Class IndexController
 * @package Application\Controller
 */
class ClienteController extends AbstractController
{
    /**
     * Rota inicial do sistema
     *
     * @return array|ViewModel
     */
    public function indexAction()
    {
        $clientes = $this->getService()->findAll();
        $view = new ViewModel(array('clientes' => $clientes));
        return $view;
    }

    /**
     * Rota para cadastrar um cliente
     *
     * @return ViewModel
     */
    public function cadastroAction()
    {
        $estados = $this->getService()->getRepository('Application\Entity\Estado')->findAll();
        $view = new ViewModel(array('estados' => $estados));

        if ($this->isPost()) {
            $arrPost = $this->getPost();
            $arrFile = $this->getFiles();

            $insereCliente = $this->getService()->insereCliente($arrPost, $arrFile);

            if ($insereCliente == true) {
                $view->setVariable('mensagem', 'Cliente cadastrado com sucesso.');
            }
        }

        return $view;
    }

    /**
     * Rota para editar um cliente
     *
     * @return ViewModel
     */
    public function editaAction()
    {
        $arrParam = $this->getParams();
        $cliente = $this->getService()->find($arrParam['id']);
        $estado = $this->getService()->getRepository('Application\Entity\Estado')->find($cliente->getUfCliente());
        $estados = $this->getService()->getRepository('Application\Entity\Estado')->findAll();
        $cidade = $this->getService()->getRepository('Application\Entity\Cidade')->find($cliente->getCidadeCliente());
        $view = new ViewModel(array('cliente' => $cliente, 'estado' => $estado, 'estados' => $estados, 'cidade' => $cidade));

        if ($this->isPost()) {
            $arrPost = $this->getPost();
            $arrFile = $this->getFiles();

            $insereUsuario = $this->getService()->editaUsuario($arrPost, $arrFile, $arrParam['id']);

            if ($insereUsuario == true) {
                $view->setVariable('mensagem', 'Usuário atualizado com sucesso.');
            }
        }

        return $view;
    }

    /**
     * Rota para deletar um cliente
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

    /**
     * Rota para visualizar um cliente
     *
     * @return ViewModel
     */
    public function visualizaAction()
    {
        $arrParam = $this->getParams();
        $cliente = $this->getService()->find($arrParam['id']);
        $estado = $this->getService()->getRepository('Application\Entity\Estado')->find($cliente->getUfCliente());
        $cidade = $this->getService()->getRepository('Application\Entity\Cidade')->find($cliente->getCidadeCliente());
        $view = new ViewModel(array('cliente' => $cliente, 'estado' => $estado, 'cidade' => $cidade));

        return $view;
    }
}