<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
            'template_cache_path' => __DIR__ . '/../templates_cache/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],

        //cambiar la url segun el servidor
        'WEBSERVICE_URL' => 'http://localhost:4000/proyectos/test_php_developer/developers-sac/public/soap'
    ],
];
