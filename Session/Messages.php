<?php
namespace Futuring\Session;

use Futuring\Session\Interfaces\Messages as MessagesInterface;
use Futuring\Session\Session;
use Futuring\Session\Storage;

/**
 * Description of Messages
 *
 * @author Breno Douglas <bdouglasans@gmail.com>
 */
class Messages implements MessagesInterface
{   
    /**
     * @var const NAME
     */
    const NAME = 'fds3219alkcqa1121';

    /**
     * Add flash message for session
     * 
     * @param String $key
     * @param String $message
     */
    public static function addFlashMessage($key, $message)
    {
        $session = new Session();
        $session->addAttr($key, $message);

        $storage = new Storage(self::NAME);
        $storage->addSession($key, $session);
    }

    /**
     * Get flash messa in Session
     * @param String $key
     */
    public static function getFlashMessage($key)
    {
        $storage = new Storage(self::NAME);
        $session = $storage->getSession($key);

        if(! $storage->unsetSession($key,true)){
            return false;
        }

        $attr = $session->getAttr($key);

        return $attr;
    }

}
