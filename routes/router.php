<?php

use controllers\BookController;


$routes = require 'routes.php';

function routesToController($url, $routes)
{
    if (array_key_exists($url, $routes)) {
        $route = $routes[$url];
        if ($_GET) {
            return view($route['class'], $route['method'], $_GET);
        }
        return view($route['class'], $route['method']);
    } else {
        abort(404);
    }
}


function abort($code = 404)
{
    http_response_code($code);
    switch ($code) {
        case 403:
            require 'views/403.php';
            break;

        default:
            require 'views/404.php';
            break;
    }
    die();
}


$url = parse_url($_SERVER['REQUEST_URI'])['path'];

routesToController($url, $routes);
