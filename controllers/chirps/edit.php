<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 2;

$chirp = $db->query('SELECT * FROM chirps WHERE id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($chirp['user_id'] === $currentUserId);

view('chirps/edit', [
    'heading' => 'Edit chirp',
    'chirp' => $chirp
]);
