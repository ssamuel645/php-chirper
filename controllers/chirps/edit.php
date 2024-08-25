<?php

use Core\App;
use Core\Database;

$heading = 'My Chirps';
$db = App::resolve(Database::class);

$currentUserId = 2;

$chirp = $db->query('select * from chirps where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($chirp['user_id'] === $currentUserId);

view('chirps/edit', compact('heading', 'chirp'));
