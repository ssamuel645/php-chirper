<?php

use Core\App;
use Core\Database;
use Core\Validator;

extract($_POST);

$errors = [];

if (!Validator::string($name, 3, 100)) {
    $errors['name'] = 'Name must have at least 3 characters and no more than 100.';
}

if (!Validator::email($email)) {
    $errors['email'] = 'Please enter a valid email address.';
}

if (!Validator::string($password, 6, 100)) {
    $errors['password'] = 'Passwords must have at least 6 characters and no more than 100.';
}

if (!Validator::password($password, $repeat_password)) {
    $errors['repeat_password'] = 'Provided password does not match.';
}

if (!empty($errors)) {
    view('users/create', [
        'heading' => 'Register',
        'errors' => $errors
    ]);
    exit();
}

$db = App::resolve(Database::class);

$user = $db->query('SELECT * FROM users WHERE email = :email', compact('email'))->find();

if ($user) {
    header('location: /login');
    exit();
} else {
    $db->query('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)', [
        'name' => $name,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    $_SESSION['user'] = $name;

    header('location: /');
    exit();
}
