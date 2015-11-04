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
 * Class ProdutoController
 * @package Application\Controller
 */
class ProdutoController extends AbstractController
{
    /**
     * Rota inicial do modulo
     *
     * @return array|ViewModel
     */
    public function indexAction()
    {
        $produtos = $this->getService()->findAll();
        $view = new ViewModel(array('produtos' => $produtos));
        return $view;
    }

    /**
     * Rota para cadastrar um produto
     *
     * @return ViewModel
     */
    public function cadastroAction()
    {
        $fornecedores = $this->getService()->getRepository('Application\Entity\Fornecedor')->findAll();
        $view = new ViewModel(array('fornecedores' => $fornecedores));

        if ($this->isPost()) {
            $arrPost = $this->getPost();
            $arrFile = $this->getFiles();

            $insereProduto = $this->getService()->insereProduto($arrPost, $arrFile);

            if ($insereProduto == true) {
                $view->setVariable('mensagem', 'Produto cadastrado com sucesso.');
            }
        }

        return $view;
    }

    /**
     * Rota para editar um produto
     *
     * @return ViewModel
     */
    public function editaAction()
    {
        $arrParam = $this->getParams();
        $produto = $this->getService()->find($arrParam['id']);
        $fornecedor = $this->getService()->getRepository('Application\Entity\Fornecedor')->find($produto->getFornecedorProduto());
        $fornecedores = $this->getService()->getRepository('Application\Entity\Fornecedor')->findAll();
        $view = new ViewModel(array('produto' => $produto, 'fornecedor' => $fornecedor, 'fornecedores' => $fornecedores));

        if ($this->isPost()) {
            $arrPost = $this->getPost();
            $arrFile = $this->getFiles();

            $editaProduto = $this->getService()->editaProduto($arrPost, $arrFile, $arrParam['id']);

            if ($editaProduto == true) {
                $view->setVariable('mensagem', 'Produto atualizado com sucesso.');
            }
        }

        return $view;
    }

    /**
     * Rota para deletar um produto
     *
     * @return ViewModel
     */
    public function deletaAction()
    {
        $response = $this->getResponse();
        $response->setStatusCode(200);
        $response->setContent(null);
        $arrParam = $this->getParams();
        $deletaProduto = $this->getService()->deletaProduto($arrParam['id']);

        if ($deletaProduto == true) {
            $this->redirect()->toRoute('produtos');
        }

        return $response;
    }

    /**
     * Rota para visualizar um produto
     *
     * @return ViewModel
     */
    public function visualizaAction()
    {
        $arrParam = $this->getParams();
        $produto = $this->getService()->find($arrParam['id']);
        $fornecedor = $this->getService()->getRepository('Application\Entity\Fornecedor')->find($produto->getFornecedorProduto());
        $view = new ViewModel(array('produto' => $produto, 'fornecedor' => $fornecedor));

        return $view;
    }
}