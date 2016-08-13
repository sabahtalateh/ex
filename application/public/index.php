<?php

date_default_timezone_set('UTC');

session_start();

require_once __DIR__ . '/../bootstrap/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';
$app::setPath(realpath(__DIR__ . '/../'));

$app::initInternitializator();

$dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->overload();

/** \App\Components\Router\Router */
$router = $app->make(\App\Components\Router\Router::class);
$router->dispatch($_SERVER['REQUEST_URI']);
