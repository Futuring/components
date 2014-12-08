<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Futuring\Session\Interfaces;

/**
 *
 * @author bdouglas
 */
interface Session
{
   public function addAttr($key, $attr);
   public function addObject($key, $object);
   public function getObject($key);
   public function getAttr($key);
   public function destroySession();
   
}
