<?php

use Core\Authenticator;
use Core\Session;
use Http\Forms\LoginForm;

extract($_POST);
$form = new LoginForm();

if ($form->validate($email, $password)) {
    if ((new Authenticator)->attempt($email, $password)) {
        redirect('/');
    }

    $form->error('email', 'No accounts found for provided email and password.');
}

Session::flash('errors', $form->errors());

redirect('/login');
