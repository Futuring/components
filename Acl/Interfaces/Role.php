<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Futuring\Acl\Interfaces;

use Futuring\Acl\Interfaces\RoleAble;
/**
 *
 * @author bdouglas
 */
interface Role
{
    
    public function addRole(RoleAble $role);
    public function hydrateResource();
    public function hydratePage();
    public function verifyIsAdmin();
    public function verifyAccess($name, $resource, $page);
}
