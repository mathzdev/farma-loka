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
use DOMPDFModule\View\Model\PdfModel;
/**
 * Class PedidoController
 * @package Application\Controller
 */
class PedidoController extends AbstractController
{
    /**
     * Rota inicial do modulo
     *
     * @return array|ViewModel
     */
    public function indexAction()
    {
        $pedidos = $this->getService()->findAll();
        $view = new ViewModel(array('pedidos' => $pedidos));
        return $view;
    }

    /**
     * Rota para cadastrar um pedido
     *
     * @return ViewModel
     */
    public function cadastroAction()
    {
        $produtos = $this->getService()->getRepository('Application\Entity\Produto')->findAll();
        $clientes = $this->getService()->getRepository('Application\Entity\Cliente')->findAll();
        $atendentes = $this->getService()->getRepository('Application\Entity\Funcionario')->findBy(array('funcaoFuncionario' => 'Atendente'));
        $caixas = $this->getService()->getRepository('Application\Entity\Funcionario')->findBy(array('funcaoFuncionario' => 'Caixa'));
        $gerentes = $this->getService()->getRepository('Application\Entity\Funcionario')->findBy(array('funcaoFuncionario' => 'Gerente'));
        $entregadores = $this->getService()->getRepository('Application\Entity\Funcionario')->findBy(array('funcaoFuncionario' => 'Motoboy'));

        $view = new ViewModel(
            array(
                'produtos' => $produtos,
                'clientes' => $clientes,
                'atendentes' => $atendentes,
                'caixas' => $caixas,
                'gerentes' => $gerentes,
                'entregadores' => $entregadores,
            )
        );

        if ($this->isPost()) {
            $arrPost = $this->getPost();

            $inserePedido = $this->getService()->inserePedido($arrPost);

            if ($inserePedido == true) {
                $view->setVariable('mensagem', 'Pedido cadastrado com sucesso.');
            }
        }

        return $view;
    }

    /**
     * Rota para cancelar um pedido
     *
     * @return ViewModel
     */
    public function cancelaAction()
    {
        $response = $this->getResponse();
        $response->setStatusCode(200);
        $response->setContent(null);
        $arrParam = $this->getParams();
        $deletaPedido = $this->getService()->cancelaPedido($arrParam['id']);

        if ($deletaPedido == true) {
            $this->redirect()->toRoute('pedidos');
        }

        return $response;
    }

    /**
     * Rota para ativar um pedido
     *
     * @return ViewModel
     */
    public function ativaAction()
    {
        $response = $this->getResponse();
        $response->setStatusCode(200);
        $response->setContent(null);
        $arrParam = $this->getParams();
        $deletaPedido = $this->getService()->ativaPedido($arrParam['id']);

        if ($deletaPedido == true) {
            $this->redirect()->toRoute('pedidos');
        }

        return $response;
    }

    /**
     * Rota para visualizar um pedido
     *
     * @return ViewModel
     */
    public function visualizaAction()
    {
        $arrParam = $this->getParams();
        $pedido = $this->getService()->find($arrParam['id']);
        $cliente = $this->getService()->getRepository('Application\Entity\Cliente')->find($pedido->getClientePedido());
        $atendente = $this->getService()->getRepository('Application\Entity\Funcionario')->find($pedido->getAtendentePedido());
        $entregador = $this->getService()->getRepository('Application\Entity\Funcionario')->find($pedido->getEntregadorPedido());
        $caixa = $this->getService()->getRepository('Application\Entity\Funcionario')->find($pedido->getCaixaPedido());
        $gerente = $this->getService()->getRepository('Application\Entity\Funcionario')->find($pedido->getGerentePedido());
        $produtoService = $this->getService()->getRepository('Application\Entity\Produto');
        $view = new ViewModel(array('pedido' => $pedido, 'cliente' => $cliente, 'atendente' => $atendente, 'entregador' => $entregador, 'caixa' => $caixa, 'gerente' => $gerente, 'produtoService' => $produtoService));

        return $view;
    }

    /**
     * Rota para a fatura de um pedido
     *
     * @return ViewModel
     */
    public function faturaAction()
    {
        $arrParam = $this->getParams();
        $pedido = $this->getService()->find($arrParam['id']);
        $cliente = $this->getService()->getRepository('Application\Entity\Cliente')->find($pedido->getClientePedido());
        $atendente = $this->getService()->getRepository('Application\Entity\Funcionario')->find($pedido->getAtendentePedido());
        $entregador = $this->getService()->getRepository('Application\Entity\Funcionario')->find($pedido->getEntregadorPedido());
        $caixa = $this->getService()->getRepository('Application\Entity\Funcionario')->find($pedido->getCaixaPedido());
        $gerente = $this->getService()->getRepository('Application\Entity\Funcionario')->find($pedido->getGerentePedido());
        $cidade = $this->getService()->getRepository('Application\Entity\Cidade')->find($cliente->getCidadeCliente());
        $produtoService = $this->getService()->getRepository('Application\Entity\Produto');
        $view = new ViewModel(array('pedido' => $pedido, 'cliente' => $cliente, 'atendente' => $atendente, 'entregador' => $entregador, 'caixa' => $caixa, 'gerente' => $gerente, 'cidade' => $cidade, 'produtoService' => $produtoService));

        return $view;
    }

    /**
     * Rota para a fatura em pdf de um pedido
     *
     * @return ViewModel
     */
    public function pdfAction()
    {
        header('Cache-Control: public');
        header('Content-type: application/pdf');
        header('Content-Disposition: attachment; filename="' . md5(time()) . '.pdf"');

        $arrParam = $this->getParams();
        $pedido = $this->getService()->find($arrParam['id']);
        $cliente = $this->getService()->getRepository('Application\Entity\Cliente')->find($pedido->getClientePedido());
        $atendente = $this->getService()->getRepository('Application\Entity\Funcionario')->find($pedido->getAtendentePedido());
        $entregador = $this->getService()->getRepository('Application\Entity\Funcionario')->find($pedido->getEntregadorPedido());
        $caixa = $this->getService()->getRepository('Application\Entity\Funcionario')->find($pedido->getCaixaPedido());
        $gerente = $this->getService()->getRepository('Application\Entity\Funcionario')->find($pedido->getGerentePedido());
        $cidade = $this->getService()->getRepository('Application\Entity\Cidade')->find($cliente->getCidadeCliente());
        $produtoService = $this->getService()->getRepository('Application\Entity\Produto');
        $view = new PdfModel();
        $view->setVariables(array('pedido' => $pedido, 'cliente' => $cliente, 'atendente' => $atendente, 'entregador' => $entregador, 'caixa' => $caixa, 'gerente' => $gerente, 'cidade' => $cidade, 'produtoService' => $produtoService));
        $view->setOption("paperSize", "a4");

        return $view;
    }
}