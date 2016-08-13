<?php

namespace App\Components\DI;

use Philo\Blade\Blade;

class DI
{
//    protected static $blade;
//
//    public function blade()
//    {
//        if (is_null(self::$blade)) {
//            self::$blade = new \Philo\Blade\Blade(
//                $views = __DIR__ . '/../../../views/',
//                $cache = __DIR__ . '/../../../bootstrap/cache/'
//            );
//        }
//
//        return self::$blade;
//    }

    public function make($class)
    {
        return new $class;
    }
}