<?php

use Core\Response;

function dd(...$values)
{
    echo "<pre>";
    var_dump(...$values);
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

function login($user)
{
    $_SESSION['user'] = $user;

    session_regenerate_id(true);
}

function logout()
{
    $_SESSION = [];
    session_destroy();

    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}
