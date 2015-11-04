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
 * Class FornecedorController
 * @package Application\Controller
 */
class FornecedorController extends AbstractController
{
    /**
     * Rota inicial do modulo
     *
     * @return array|ViewModel
     */
    public function indexAction()
    {
        $fornecedores = $this->getService()->findAll();
        $view = new ViewModel(array('fornecedores' => $fornecedores));
        return $view;
    }

    /**
     * Rota para cadastrar um fornecedor
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

            $insereFornecedor = $this->getService()->insereFornecedor($arrPost, $arrFile);

            if ($insereFornecedor == true) {
                $view->setVariable('mensagem', 'Fornecedor cadastrado com sucesso.');
            }
        }

        return $view;
    }

    /**
     * Rota para editar um fornecedor
     *
     * @return ViewModel
     */
    public function editaAction()
    {
        $arrParam = $this->getParams();
        $fornecedor = $this->getService()->find($arrParam['id']);
        $estado = $this->getService()->getRepository('Application\Entity\Estado')->find($fornecedor->getUfFornecedor());
        $estados = $this->getService()->getRepository('Application\Entity\Estado')->findAll();
        $cidade = $this->getService()->getRepository('Application\Entity\Cidade')->find($fornecedor->getCidadeFornecedor());
        $view = new ViewModel(array('fornecedor' => $fornecedor, 'estado' => $estado, 'estados' => $estados, 'cidade' => $cidade));

        if ($this->isPost()) {
            $arrPost = $this->getPost();

            $editaFornecedor = $this->getService()->editaFornecedor($arrPost, $arrParam['id']);

            if ($editaFornecedor == true) {
                $view->setVariable('mensagem', 'Fornecedor atualizado com sucesso.');
            }
        }

        return $view;
    }

    /**
     * Rota para deletar um fornecedor
     *
     * @return ViewModel
     */
    public function deletaAction()
    {
        $response = $this->getResponse();
        $response->setStatusCode(200);
        $response->setContent(null);
        $arrParam = $this->getParams();
        $deletaFornecedor = $this->getService()->deletaFornecedor($arrParam['id']);

        if ($deletaFornecedor == true) {
            $this->redirect()->toRoute('fornecedores');
        }

        return $response;
    }

    /**
     * Rota para visualizar um fornecedor
     *
     * @return ViewModel
     */
    public function visualizaAction()
    {
        $arrParam = $this->getParams();
        $fornecedor = $this->getService()->find($arrParam['id']);
        $estado = $this->getService()->getRepository('Application\Entity\Estado')->find($fornecedor->getUfFornecedor());
        $cidade = $this->getService()->getRepository('Application\Entity\Cidade')->find($fornecedor->getCidadeFornecedor());
        $view = new ViewModel(array('fornecedor' => $fornecedor, 'estado' => $estado, 'cidade' => $cidade));

        return $view;
    }
}