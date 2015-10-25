<?php
/**
 * Created by PhpStorm.
 * User: matheuslucio
 * Date: 24/10/15
 * Time: 19:56
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Session\Container;

class AbstractController extends AbstractActionController
{
    /**
     * @param null $class
     * @return null
     */
    public function getService($class = null)
    {
        $objectManager = $this
            ->getServiceLocator()
            ->get('Doctrine\ORM\EntityManager');

        if ($class == null) {
            return null;
        } else {
            return new $class($objectManager);
        }
    }

    /**
     * @return mixed
     */
    public function getPost()
    {
        $request = $this->getRequest();
        return $request->getPost();
    }

    /**
     * @return mixed
     */
    public function isPost()
    {
        $request = $this->getRequest();
        return $request->isPost();
    }

    /**
     * @return Container
     */
    public function getUserSession()
    {
        $sessionUser = new Container('user_session');
        return $sessionUser;
    }
}