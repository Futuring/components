<?php

namespace Futuring\Acl\Factory;

use Futuring\Acl\Interfaces\Factory\AclFactory as AclInterface;
use Futuring\Acl\Interfaces\RoleAble;
use Futuring\Acl\Role;
use Futuring\Acl\Acl;

/**
 * @author bdouglas <bdgoulasans@gmail.com>
 * @package ACL
 */
class AclFactory implements AclInterface
{
    public static function create(RoleAble $role)
    {
        $roles = new Role($role);
        $roles->hydratePage()->hydrateResource()->verifyIsAdmin();
        
        $acl = new Acl($roles);
        
        return $acl;
    }
}
