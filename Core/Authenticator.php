<?php

namespace Core;

class Authenticator
{
    public function attempt($email, $password)
    {
        $db = App::resolve(Database::class);
        $user = $db->query('SELECT * FROM users WHERE email = :email', compact('email'))->find();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login([
                    'id' => $user['id'],
                    'name' => $user['name'],
                    'email' => $user['email']
                ]);

                return true;
            }
        }

        return false;
    }

    public function login($user)
    {
        $_SESSION['user'] = $user;

        session_regenerate_id(true);
    }

    public function logout()
    {
        Session::destroy();
    }
}
