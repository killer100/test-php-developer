<?php
// DIC configuration

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

$container['App\services\EmpleadoService'] = function(){
    return new App\services\EmpleadoService();
};

$container['App\http\controllers\EmpleadoController'] = function ($c) {
    $renderer = $c->get("renderer"); // retrieve the 'view' from the container
    $empleadoService = $c->get('App\services\EmpleadoService');
    return new App\http\controllers\EmpleadoController($renderer, $empleadoService);
};
