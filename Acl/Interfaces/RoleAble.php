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
interface RoleAble
{
    /**
     * @return string
     */
    public function getName();
    
    /**
     * @return boolean 
     */
    public function isAdmin();
    
    /**
     * @return array Resources of user
     */
    public function getResources();
    
    /**
     * @return array Pages of user for resources
     */
    public function getPages();
    
}
