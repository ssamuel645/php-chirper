<?php

use Core\App;
use Core\Database;
use Core\Validator;

extract($_POST);

if (!Validator::email($email)) {
    $errors['email'] = 'Please enter a valid email address.';
}

if (!Validator::string($password)) {
    $errors['password'] = 'Please enter a valid password.';
}

if (!empty($errors)) {
    view('session/create', [
        'heading' => 'Log In!',
        'errors' => $errors
    ]);
    exit();
}

$db = App::resolve(Database::class);
$user = $db->query('SELECT * FROM users WHERE email = :email', compact('email'))->find();

if ($user) {
    if (password_verify($password, $user['password'])) {
        login([
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email']
        ]);

        header('location: /');
        exit();
    }
}

view('session/create', [
    'heading' => 'Log In!',
    'errors' => [
        'email' => 'No accounts found for provided email and password.'
    ]
]);
