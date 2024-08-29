<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);


$chirps = $db
    ->query(
        'SELECT chirps.id AS chirpId, content, name, email FROM chirps
        INNER JOIN users ON chirps.user_id = users.id WHERE user_id = :user_id',
        [
            'user_id' => $_SESSION['user']['id']
        ]
    )->get();


view('chirps/index', [
    'heading' => 'My chirps',
    'chirps' => array_reverse($chirps)
]);
