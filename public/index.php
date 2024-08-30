<?php

use Core\Session;
use Core\Exceptions\ValidationException;

define('BASE_PATH', __DIR__ . '/../');

session_start();

require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

    require base_path($class);
});

require base_path('bootstrap.php');

$router = new Core\Router();

$routes = require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try {
    $router->route($uri, $method);
} catch (ValidationException $exception) {
    Session::flash('errors', $exception->errors);
    Session::flash('old', $exception->old);

    return back();
}


Session::unflash();
