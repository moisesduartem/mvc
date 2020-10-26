<?php
use Bootstrap\Router;
$router = new Router(BASE_URL);
$router->setNamespace('App\\Controllers\\');

$router->on('index', 'IndexController.index');
$router->on('', 'IndexController.list');

$router->run();