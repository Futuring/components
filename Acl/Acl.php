<?php

namespace Futuring\Acl;

use Futuring\Acl\Interfaces\Role as Roles;
use Futuring\Acl\Interfaces\Acl as AclInterface;
use Futuring\Session\Storage;
use Futuring\Session\Session;

/**
 * Description of Acl
 *
 * @author bdouglas
 */
class Acl implements AclInterface
{
    const NAME = "aclAdmin";
    
    public function __construct(Roles $role)
    {
        $session = new Session(self::NAME);
        $session->addObject('role', $role);
        $storage = new Storage(self::NAME);
        $storage->addSession('acl', $session);
    }
    
    public static function accessable($name, $resource, $page)
    {
        $storage = new Storage(self::NAME);
        $session = $storage->getSession('acl');
        $role = $session->getObject('role');
        
        if ($role->isAdmin()) {
            return true;
        }
        
        return $role->verifyAccess($name, $resource, $page);
    }
    
    public static function isAdmin()
    {
        $storage = new Storage(self::NAME);
        $session = $storage->getSession('acl');
        $role = $session->getObject('role');
        
        if ($role->isAdmin()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getRole()
    {
        $storage = new Storage(self::NAME);
        $session = $storage->getSession('acl');
        $role = $session->getObject('role');
        
        return $role;
    }

    public function setRole(Roles $role)
    {
        $session = new Session(self::NAME);
        $session->addObject('role', $role);
        $storage = new Storage(self::NAME);
        $storage->addSession('acl', $session);
        
        return $this;
    }
    
    public static function destroy()
    {
        $storage = new Storage(self::NAME);
        $storage->unsetSession("acl");
    }

}
