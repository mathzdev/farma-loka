<?php
/**
 * Created by PhpStorm.
 * User: matheuslucio
 * Date: 25/10/15
 * Time: 08:54
 */

namespace Application\Service;

/**
 * Class AbstractService
 * @package Application\Service
 */
class AbstractService
{
    protected $em;

    public function __construct($objectManager)
    {
        $this->em = $objectManager;
    }

    /**
     * @param $repository
     * @return mixed
     */
    public function getRepository($repository)
    {
        return $this->em->getRepository($repository);
    }

    /**
     * Transforms an under_scored_string to a camelCasedOne
     */
    public function camelize($scored)
    {
        return lcfirst(implode('', array_map('ucfirst', array_map('strtolower', explode('_', $scored)))));
    }
}