<?php
const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function($class) {

    $class= str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require base_path("{$class}.php");
});

use Core\Container;
use Core\App;
use Core\Database;

$container = new Container();

$container->bind('Core\Database', function() {
    $config = require base_path('config.php');
    return new Database($config['database']);
});

$db = $container->resolve('Core\Database');

App::setContainer($container);

$router = new Core\Router();

$routes = require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI']) ['path'];

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);