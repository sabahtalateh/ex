<?php

namespace App\Components\Flash;

class Flash
{
    public static function set($name, $flash)
    {
        $_SESSION[$name] = $flash;
    }

    public static function get($name)
    {
        $flash = $_SESSION[$name];
        unset($_SESSION[$name]);
        return $flash;
    }

    public static function has($name)
    {
        return isset($_SESSION[$name]) ? true : false;
    }

}