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
interface Messages
{
    public static function addFlashMessage($key,$message);
    public static function getFlashMessage($key);
}
