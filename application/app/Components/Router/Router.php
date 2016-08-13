<?php

namespace App\Components\Router;

use App\Components\App\App;

class Router
{
    protected $routes;

    public function __construct()
    {
        $this->routes = require_once App::path() . '/app/Http/routes.php';
    }

    public function dispatch($action)
    {
        $reqMethod = empty($_POST) ? 'get' : 'post';

        $route = explode('?', $action)[0];

        if (!array_key_exists($route, $this->routes)) {
            throw new NoSuchRouteException("Не существует такого роута {$route}");
        }

        if (!in_array($reqMethod, ['get', 'post'])) {
            throw new \Exception('Недопустимый метод. Проверьте правильность routes.php');
        }

        if (!isset($this->routes[$route][$reqMethod]['action'])) {
            throw new \Exception('Не указано действие. Проверьте правильность routes.php');
        }

        $exploded = explode('@', $this->routes[$route][$reqMethod]['action']);

        $controller = "\\App\\Controllers\\" . $exploded[0];
        $action = $exploded[1];

        if (method_exists($controller, $action)) {
            return (new $controller)->$action();
        } else {
            throw new \Exception("Не существует такого действия {$controller}@{$action}. Проверьте routes.php или создайте контроллер");
        }
    }
}