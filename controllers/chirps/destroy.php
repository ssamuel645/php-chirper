<?php

use Core\App;
use Core\Database;

$heading = 'My Chirps';

$db = App::resolve(Database::class);

$currentUserId = 2;

$chirp = $db->query('select * from chirps where id = :id', [
    'id' => $_POST['id']
])->findOrFail();

authorize($chirp['user_id'] === $currentUserId);

$db->query('DELETE FROM chirps WHERE id = :id', [
    'id' => $_POST['id']
]);

header('location: /chirps');
exit();
