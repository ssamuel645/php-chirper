<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$chirps = $db
    ->query('SELECT * FROM chirps INNER JOIN  users ON chirps.user_id = users.id')
    ->get();

view('index', [
    'heading' => 'Home',
    'chirps' => array_reverse($chirps)
]);
