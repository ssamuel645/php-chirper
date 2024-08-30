<?php

namespace Core;

class Session
{
    public static function has($key)
    {
        return array_key_exists($key, $_SESSION);
    }

    public static function put($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key, $default = null)
    {
        return $_SESSION['_flashed'][$key] ?? $_SESSION[$key] ?? $default;
    }

    public static function forget($key)
    {
        unset($_SESSION[$key]);
    }

    public static function flash($key, $value)
    {
        $_SESSION['_flashed'][$key] = $value;
    }

    public static function unflash()
    {
        static::forget('_flashed');
    }

    public static function flush()
    {
        $_SESSION = [];
    }

    public static function destroy()
    {
        static::flush();
        session_destroy();

        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}
