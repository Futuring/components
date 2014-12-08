<?php

namespace Futuring\Session;

use Futuring\Session\Interfaces\Storage as StorageInterface;

/**
 * Description of Storage
 *
 * @author Breno Douglas <bdouglasans@gmail.com>
 */
class Storage implements StorageInterface
{
    /**
     * @var $_SESSION
     */
    private $session;
    private $sessionCollection;
    private $name;
    
    public function __construct($name)
    {
        $this->name = $name;
        $this->session = &$_SESSION;
        $this->sessionCollection = new \ArrayIterator();
        $this->startSession();
    }
    
    private function startSession()
    {
        if(!isset($_SESSION)){
            session_start();
        }
    }
    public function addSession($key, Interfaces\Session $session)
    {
        $this->sessionCollection->offsetSet($key, serialize($session));
        $this->session[$this->name] = serialize($this->sessionCollection);
    }

    public function existsSession($key)
    {
        return isset($this->session[$this->name]);
    }

    public function getSession($key)
    {
        $collection = isset($this->session[$this->name]) ? unserialize($this->session[$this->name]) : false;
        
        if(!$collection):
            return false;
        endif;
        
        return $collection->offsetExists($key) ? unserialize($collection->offsetGet($key)) : false;
    }

    public function unsetSession($key, $destroy = true)
    {
        $collection = isset($this->session[$this->name]) ? unserialize($this->session[$this->name]) : false;
        
        if(!$collection):
            return false;
        else:
            unset($this->session[$this->name]);
            @session_destroy();
        endif;
        
        
        $exists = $collection->offsetExists($key);
        
        $exists ? $collection->offsetUnset($key) : false;
        
        return $exists;
    }

}
