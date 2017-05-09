<?php
// Routes

$app->get('/empleados', 'App\http\controllers\EmpleadoController:index');
$app->get('/empleados/{id}', 'App\http\controllers\EmpleadoController:VerDetalle');

$app->group('/soap', function () {
    $this->get('/wsdl', App\http\controllers\ServiceController::class . ':wsdl');
    $this->post('', App\http\controllers\ServiceController::class . ':indexWS');    
});

/*
$app->get('/[{name}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});*/
