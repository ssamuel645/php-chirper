<?php

use Core\Session;

view('session/create', [
    'heading' => 'Log In!',
    'errors' => Session::get('errors'),
]);
