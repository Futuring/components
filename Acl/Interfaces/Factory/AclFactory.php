<?php
namespace Futuring\Acl\Interfaces\Factory;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Futuring\Acl\Interfaces\RoleAble;
/**
 * 
 * @author bdouglas
 */
interface AclFactory
{
    
    /**
     * @param RoleAble $name Description
     * @return type Description
     */
    public static function create(RoleAble $role);
    
}
