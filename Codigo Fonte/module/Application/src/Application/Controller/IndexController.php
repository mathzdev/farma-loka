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
class IndexController extends AbstractController
{
    /**
     * Rota inicial do sistema
     *
     * @return array|ViewModel
     */
    public function indexAction()
    {
        $countClientes = $this->getService('Application\Service\Cliente')->findAll();
        $arrReturn = array(
            'countClientes' => count($countClientes)
        );
        return new ViewModel($arrReturn);
    }
}
