<?php

namespace Futuring\Acl;

/**
 * Description of Page
 *
 * @author bdouglas
 */
class Page
{
    private $pages;
    
    public function __construct()
    {
        $this->pages = new \ArrayIterator();
    }
    
    public function addPage($name)
    {
        $this->pages->append($name);
    }
    
    public function getArray()
    {
        return $this->pages->getArrayCopy();
    }
}
