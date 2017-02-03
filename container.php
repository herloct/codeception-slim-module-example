<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

use Interop\Container\ContainerInterface;
use Slim\App;
use Slim\Container;

$container = new Container([
    App::class => function (ContainerInterface $c) {
        $app = new App($c);

        // routes and middlewares here
        $app->get('/hello/{name}', function (Request $request, Response $response) {
            $name = $request->getAttribute('name');
            $response->getBody()->write("Hello, $name");

            return $response;
        });

        return $app;
    }
]);

return $container;
