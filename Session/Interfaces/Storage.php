<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Futuring\Session\Interfaces;

use Futuring\Session\Interfaces\Session;

/**
 *
 * @author bdouglas
 */
interface Storage
{
    public function addSession($key, Session $session);
    public function getSession($key);
    public function existsSession($key);
    public function unsetSession($key, $destroy = true);
}
