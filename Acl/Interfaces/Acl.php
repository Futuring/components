<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Futuring\Acl\Interfaces;

/**
 *
 * @author bdouglas
 */
interface Acl
{
    /**
     * @return Role
     */
    public function getRole();
    
    /**
     * @param Role $role
     * @return self $this
     */
    public function setRole(Role $role);
    
    /**
     * @param string $name Name role of User
     * @param string $resource Name resource of Role
     * @param string $page Name page of user accessable
     * @return boolean Yes access or Not access
     */
    public static function accessable($name, $resource, $page);
    
    
    public static function destroy();
}
