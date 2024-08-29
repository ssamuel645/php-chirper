<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

extract($_POST);
$form = new LoginForm();

if ($form->validate($email, $password)) {
    if ((new Authenticator)->attempt($email, $password)) {
        redirect('/');
    }

    $form->error('email', 'No accounts found for provided email and password.');
}

view('session/create', [
    'heading' => 'Log In!',
    'errors' => $form->errors()
]);
