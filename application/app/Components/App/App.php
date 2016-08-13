<?php

namespace App\Components\App;

class App
{
    protected static $path;

    public static function path()
    {
        return self::$path;
    }

    public static final function setPath($path)
    {
        self::$path = $path;
    }

    public function make(String $class)
    {
        return new $class;
    }

    public function initInternitializator()
    {
        \App\Components\Internationalization\Internationalizator::init();
    }
}