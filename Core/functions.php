<?php

use Core\Response;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = 404)
{
    http_response_code($code);

    view("errors/$code");

    die();
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($name, $data = [])
{
    extract($data);

    return require BASE_PATH . "views/$name.view.php";
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}
