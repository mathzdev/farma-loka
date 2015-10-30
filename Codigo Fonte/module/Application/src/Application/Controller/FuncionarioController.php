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
 * Class FuncionarioController
 * @package Application\Controller
 */
class FuncionarioController extends AbstractController
{
    /**
     * Rota inicial do modulo
     *
     * @return array|ViewModel
     */
    public function indexAction()
    {
        $funcionarios = $this->getService()->findAll();
        $view = new ViewModel(array('funcionarios' => $funcionarios));
        return $view;
    }

    /**
     * Rota para cadastrar um funcionario
     *
     * @return ViewModel
     */
    public function cadastroAction()
    {
        $estados = $this->getService()->getRepository('Application\Entity\Estado')->findAll();
        $view = new ViewModel(array('estados' => $estados));

        if ($this->isPost()) {
            $arrPost = $this->getPost();

            $insereFuncionario = $this->getService()->insereFuncionario($arrPost);

            if ($insereFuncionario == true) {
                $view->setVariable('mensagem', 'Funcionário cadastrado com sucesso.');
            }
        }

        return $view;
    }

    /**
     * Rota para editar um funcionario
     *
     * @return ViewModel
     */
    public function editaAction()
    {
        $arrParam = $this->getParams();
        $funcionario = $this->getService()->find($arrParam['id']);
        $estado = $this->getService()->getRepository('Application\Entity\Estado')->find($funcionario->getUfFuncionario());
        $estados = $this->getService()->getRepository('Application\Entity\Estado')->findAll();
        $cidade = $this->getService()->getRepository('Application\Entity\Cidade')->find($funcionario->getCidadeFuncionario());
        $view = new ViewModel(array('funcionario' => $funcionario, 'estado' => $estado, 'estados' => $estados, 'cidade' => $cidade));

        if ($this->isPost()) {
            $arrPost = $this->getPost();

            $editaFuncionario = $this->getService()->editaFuncionario($arrPost, $arrParam['id']);

            if ($editaFuncionario == true) {
                $view->setVariable('mensagem', 'Funcionário atualizado com sucesso.');
            }
        }

        return $view;
    }

    /**
     * Rota para deletar um funcionario
     *
     * @return ViewModel
     */
    public function deletaAction()
    {
        $response = $this->getResponse();
        $response->setStatusCode(200);
        $response->setContent(null);
        $arrParam = $this->getParams();
        $deletaFuncionario = $this->getService()->deletaFuncionario($arrParam['id']);

        if ($deletaFuncionario == true) {
            $this->redirect()->toRoute('funcionarios');
        }

        return $response;
    }

    /**
     * Rota para visualizar um funcionario
     *
     * @return ViewModel
     */
    public function visualizaAction()
    {
        $arrParam = $this->getParams();
        $funcionario = $this->getService()->find($arrParam['id']);
        $estado = $this->getService()->getRepository('Application\Entity\Estado')->find($funcionario->getUfFuncionario());
        $cidade = $this->getService()->getRepository('Application\Entity\Cidade')->find($funcionario->getCidadeFuncionario());
        $view = new ViewModel(array('funcionario' => $funcionario, 'estado' => $estado, 'cidade' => $cidade));

        return $view;
    }
}