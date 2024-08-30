<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

extract($_POST);

$form = LoginForm::validate([
    'email' => $email,
    'password' => $password
]);

$signedIn = (new Authenticator)->attempt($email, $password);

if (! $signedIn) {
    $form->error('email', 'No accounts found for provided email and password.')
        ->throw();
}

redirect('/');
