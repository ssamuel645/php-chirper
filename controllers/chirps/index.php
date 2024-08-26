<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 2;

$chirps = $db
    ->query(
        'SELECT chirps.id AS chirpId, content, name, email FROM chirps
        INNER JOIN users ON chirps.user_id = users.id WHERE user_id = :user_id',
        [
            'user_id' => $currentUserId
        ]
    )->get();

view('chirps/index', [
    'heading' => 'My chirps',
    'chirps' => array_reverse($chirps)
]);
