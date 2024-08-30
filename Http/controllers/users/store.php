<?php

use Core\App;
use Core\Database;
use Http\Forms\RegistrationForm;
use Core\Authenticator;

extract($_POST);

$form = RegistrationForm::validate([
    'name' => $name,
    'email' => $email,
    'password' => $password,
    'repeat_password' => $repeat_password
]);

$db = App::resolve(Database::class);

$user = $db->query('SELECT * FROM users WHERE email = :email', compact('email'))->find();

if ($user) {
    $form->error('email', 'Email is already taken.')
        ->throw();
}

$db->query('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)', [
    'name' => $name,
    'email' => $email,
    'password' => password_hash($password, PASSWORD_BCRYPT)
]);

$user = $db->query('SELECT * FROM users WHERE email = :email', compact('email'))->find();

(new Authenticator)->attempt($email, $password);

redirect('/');
