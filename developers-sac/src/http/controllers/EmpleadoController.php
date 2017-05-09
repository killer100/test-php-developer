<?php

namespace App\http\controllers;

use App\services\EmpleadoService;

class EmpleadoController
{
    protected $renderer;
    protected $_empleadoService;
    
    public function __construct($renderer, EmpleadoService $empleadoService) {
        $this->renderer = $renderer;
        $this->_empleadoService = $empleadoService;
    }
    public function index($request, $response, $args) {
        $empleados = $this->_empleadoService->ListarEmpleados();

        return $this->renderer->render($response, 'empleados.phtml', [
            'empleados' => $empleados
        ], $args);
    }

    public function VerDetalle($request, $response, $args){

        $empleado = $this->_empleadoService->ListarEmpleado($args["id"]);

        return $this->renderer->render($response, 'ver-empleado.phtml', [
            'empleado' => $empleado
        ], $args);
    }
}