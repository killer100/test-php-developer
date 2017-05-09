<?php

namespace App\http\controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use Zend\Soap\AutoDiscover;
use Zend\Soap\Server as SoapServer;


class ServiceController{

    protected $container;

    public function __construct($container){
        $this->container = $container;
    }

    public function wsdl(Request $request, Response $response) {
        $autodiscover = new AutoDiscover();
        $autodiscover
            ->setClass(\App\services\EmpleadoService::class)
            ->setServiceName('MyServices')
            ->setUri($this->container->get('settings')['WEBSERVICE_URL']);
        $response->withHeader('Content-type', 'Content-type: application/xml');
        $response->write($autodiscover->toXml());
    }

    public function indexWS(Request $request, Response $response) {
        $options = array('uri' => $this->container->get('settings')['WEBSERVICE_URL'],'location' => $this->container->get('settings')['WEBSERVICE_URL']);
        $server = new SoapServer($this->container->get('settings')['WEBSERVICE_URL'] . "/wsdl", $options);
        $server->setClass(\App\services\EmpleadoService::class);
        $server->handle();
    }

}