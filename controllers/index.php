<?php

use Core\App;
use Core\Database;

$heading = 'Home';

$db = App::resolve(Database::class);

$chirps = $db
    ->query('select * from chirps inner join users on chirps.user_id = users.id')
    ->get();

view('index', compact('heading', 'chirps'));
