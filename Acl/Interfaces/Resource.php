<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Futuring\Acl\Interfaces;

/**
 *
 * @author bdouglas <bdouglasans@gmail.com>
 */
interface Resource
{
    public function addResourceName($name);
    public function addResourceArray(array $array);
    public function getResourcesArray();
}
