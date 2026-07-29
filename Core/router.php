<?php

namespace Core;

class Router{

    public $routes = [];

    public function add($method, $uri, $controller){
        $this->routes[] = [
            'uri' => $uri,
            'method' => $method,
            'controller' => $controller
        ];
    }

    public function get($uri, $controller) {
        $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller) {
        $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller) {
        $this->add('Delete', $uri, $controller);
    }

    public function patch($uri, $controller) {
        $this->add('PATCH', $uri, $controller);
    }

    public function put($uri, $controller) {
        $this->add('PUT', $uri, $controller);
    }

    public function route($uri, $method) {
        foreach($this->routes as $route) {
            if($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require base_path($route['controller']);
            }
        }

        $this->abort();
    }
}


// function routeToController($uri, $routes) {
//     if (array_key_exists($uri, $routes)) {
//         require base_path($routes[$uri]);
//     } else {
//         abort(404);
//     }
// }


// function abort($code = 404) {
//     http_response_code(404);

//     require base_path("views/{$code}.php");

//     die();
// }

// $routes = require base_path('routes.php');
// $uri = parse_url($_SERVER['REQUEST_URI']) ['path'];

// routeToController($uri, $routes);