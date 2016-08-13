<?php

namespace App\Controllers;

use App\Components\App\App;
use App\Components\Request\Request;

class BaseController
{
    private static $blade;

    protected $DI;

    protected $middlewares = [];

    /** @var Request */
    protected $request;

    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        $this->DI = new \App\Components\DI\DI();
        $this->request = new Request($_REQUEST, $_SERVER);
        $this->runMiddlewares();
    }

    protected function blade()
    {

        if (is_null(self::$blade)) {
            self::$blade = new \Philo\Blade\Blade(
                $views = App::path() . '/' . getenv('BLADE_VIEWS'),
                $cache = App::path() . '/' . getenv('BLADE_CACHE')
            );
        }
        return self::$blade;
    }

    public function runMiddlewares()
    {
        foreach ($this->middlewares as $middleware) {
            (new $middleware)->run();
        }
    }
}
