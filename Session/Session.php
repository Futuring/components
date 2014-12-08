<?php

namespace Futuring\Session;

use Futuring\Session\Interfaces\Session as SessionInterface;
use Serializable;

/**
 * Description of Session
 *
 * @author Breno Douglas <bdouglasans@gmail.com>
 */
class Session implements SessionInterface 
{
    private $attrs;
    
    public function __construct()
    {
        $this->attrs = new \ArrayIterator();
    }
    
    public function addAttr($key, $attr)
    {
        $this->attrs->offsetSet($key, $attr);
    }

    public function addObject($key, $object)
    {
        $object = serialize($object); 
        $this->attrs->offsetSet($key, $object);
    }
    
    public function destroySession()
    {
        session_destroy();
    }

    public function getAttr($key)
    {
        return $this->attrs->offsetExists($key) ? $this->attrs->offsetGet($key) : false;
    }

    public function getObject($key)
    {
        return $this->attrs->offsetExists($key) ? unserialize($this->attrs->offsetGet($key)) : false;
    }
}
