<?php

namespace Futuring\Acl;

use Futuring\Acl\Interfaces\Resource as ResourceInterface;

/**
 * Description of Resource
 *
 * @author bdouglas <bdouglasans@gmail.com>
 * @package ACL
 */
class Resource implements ResourceInterface
{
    /**
     *
     * @var ArrayIterator
     */
    private $resources;
    
    public function __construct()
    {
        $this->resources = new \ArrayIterator();
    }
    
    /**
     * 
     * @param array $array
     */
    public function addResourceArray(array $array)
    {
        foreach($array as $value) {
            $this->resources->append($value);
        }
    }

    /**
     * 
     * @param string $name
     */
    public function addResourceName($name)
    {
        $this->resources->append($name);
    }

    /**
     * 
     * @return array $array
     */
    public function getResourcesArray()
    {
        return $this->resources->getArrayCopy();
    }

}
