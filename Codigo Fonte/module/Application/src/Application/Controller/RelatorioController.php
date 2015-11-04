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
 * Class RelatorioController
 * @package Application\Controller
 */
class RelatorioController extends AbstractController
{
    /**
     * Rota inicial do modulo
     *
     * @return array|ViewModel
     */
    public function indexAction()
    {
        /**
         * Obs alterar tambem na index controller
         */
        $countClientes = $this->getService('Application\Service\Cliente')->findAll();
        $countFuncionarios = $this->getService('Application\Service\Funcionario')->findAll();
        $countFornecedores = $this->getService('Application\Service\Fornecedor')->findAll();
        $countProdutos = $this->getService('Application\Service\Produto')->findAll();

        $arrReturn = array(
            'countClientes' => count($countClientes),
            'countFuncionarios' => count($countFuncionarios),
            'countFornecedores' => count($countFornecedores),
            'countProdutos' => count($countProdutos),
        );

        return new ViewModel($arrReturn);
    }

    /**
     * Rota do relatorio funcionarios x cargo
     */
    public function funcionariosCargosAction()
    {

        $countAtendente = $this->getService('Application\Service\Funcionario')->findBy(array('funcao_funcionario' => 'Atendente'));
        $countCaixa = $this->getService('Application\Service\Funcionario')->findBy(array('funcao_funcionario' => 'Caixa'));
        $countGerente = $this->getService('Application\Service\Funcionario')->findBy(array('funcao_funcionario' => 'Gerente'));
        $countMotoboy = $this->getService('Application\Service\Funcionario')->findBy(array('funcao_funcionario' => 'Motoboy'));

        $arrReturn = array(
            'countAtendente' => count($countAtendente),
            'countCaixa' => count($countCaixa),
            'countGerente' => count($countGerente),
            'countMotoboy' => count($countMotoboy),
        );

        return new ViewModel($arrReturn);
    }

    /**
     * Rota do relatorio produtos x fornecedores
     */
    public function produtosFornecedoresAction()
    {
        $produtosFornecedores = $this->getService('Application\Service\Produto')->produtosFornecedores();

        $arrReturn = array(
            'produtosFornecedores' => $produtosFornecedores,
        );

        return new ViewModel($arrReturn);
    }
}
