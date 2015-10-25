<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\View\Helper\Placeholder\Container;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractController
{
    /**
     * Override, check for login etc
     *
     * @param \Zend\Mvc\MvcEvent $e
     *
     * @return void
     */
    public function onDispatch(\Zend\Mvc\MvcEvent $e)
    {
        if ($this->getUserSession()->logado == false) {
            $this->redirect()->toUrl('/autenticacao/login');
        }
    }
    public function indexAction()
    {
        return new ViewModel();
    }
}
