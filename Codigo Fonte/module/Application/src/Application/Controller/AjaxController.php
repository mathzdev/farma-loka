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
class AjaxController extends AbstractController
{
    /**
     * Rota inicial do sistema
     *
     * @return array|ViewModel
     */
    public function indexAction()
    {
        $response = $this->getResponse();
        $response->setStatusCode(200);
        $response->setContent(null);
    }

    /**
     * Rota para puxar as cidades
     */
    public function cidadesAction()
    {
        header('Content-type: application/json;');
        $response = $this->getResponse();
        $response->setStatusCode(200);
        $arrParam = $this->getParams();
        $cidades = $this->getService()->getRepository('Application\Entity\Cidade')->findBy(array('idEstado' => $arrParam['id']));
        $arrJson = array();

        foreach ($cidades as $cidade) {
            $arrJson[] = array('idCidade' => $cidade->getIdCidade(), 'nomeCidade' => $cidade->getNomeCidade());
        }

        $response->setContent(json_encode($arrJson));
        return $response;
    }
}
