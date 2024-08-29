<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);


$chirp = $db->query('SELECT * FROM chirps WHERE id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($chirp['user_id'] === $_SESSION['user']['id']);

view('chirps/edit', [
    'heading' => 'Edit chirp',
    'chirp' => $chirp
]);
