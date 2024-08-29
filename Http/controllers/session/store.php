<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

extract($_POST);

$form = new LoginForm();

if (! $form->validate($email, $password)) {
    view('session/create', [
        'heading' => 'Log In!',
        'errors' => $form->errors()
    ]);
};

$auth = new Authenticator();

if ($auth->attempt($email, $password)) {
    redirect('/');
}

view('session/create', [
    'heading' => 'Log In!',
    'errors' => [
        'email' => 'No accounts found for provided email and password.'
    ]
]);
