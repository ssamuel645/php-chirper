<?php

use Core\Session;

view('users/create', [
    'heading' => 'Register',
    'errors' => Session::get('errors')
]);
