<?php

namespace Futuring\Acl;

use Futuring\Acl\Interfaces\Role as RoleInterface;
use Futuring\Acl\Interfaces\RoleAble;

/**
 * Description of Role
 *
 * @author bdouglas <bdouglasans@gmail.com>
 * @package ACL
 */
class Role implements RoleInterface
{

    private $name;
    
    /**
     *
     * @var RoleAble
     */
    private $role;

    /**
     *
     * @var boolean
     */
    private $isAdmin;

    /**
     *
     * @var \ArrayIterator
     */
    private $pages;

    /**
     *
     * @var \ArrayIterator
     */
    private $resources;

    /**
     * @param RoleAble $role
     */
    public function __construct(RoleAble $role)
    {
        $this->role = $role;  
        $this->name = $role->getName();
        $this->pages = new \ArrayIterator();
        $this->resources = new \ArrayIterator();
    }

    /**
     * 
     * @param RoleAble $role
     */
    public function addRole(RoleAble $role)
    {
        $this->role = $role;
    }

    public function hydratePage()
    {
        $role = $this->role;
        
        $pages = $role->getPages();

        foreach ($pages as $page):
            $this->pages->offsetSet($page, $page);
        endforeach;
        
        return $this;
    }

    public function hydrateResource()
    {
        $role = $this->role;
        $resources = $role->getResources();
        
        foreach ($resources as $value):
            $this->resources->offsetSet($value, $value);
        endforeach;
        
        return $this;
    }

    public function verifyIsAdmin()
    {
        $this->isAdmin = $this->role->isAdmin();
    }

    public function isAdmin()
    {
        return $this->isAdmin;
    }

    public function verifyAccess($name, $resource, $page)
    {
        if (! $this->resources->offsetExists($resource)) {
            return false;
        }
         
        if (! $this->pages->offsetExists($page)) {
            return false;
        }
        
        return true;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    public function getPages()
    {
        return $this->pages;
    }

    public function getResources()
    {
        return $this->resources;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setRole(RoleAble $role)
    {
        $this->role = $role;
        return $this;
    }

    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;
        return $this;
    }

    public function setPages(\ArrayIterator $pages)
    {
        $this->pages = $pages;
        return $this;
    }

    public function setResources(\ArrayIterator $resources)
    {
        $this->resources = $resources;
        return $this;
    }

}
