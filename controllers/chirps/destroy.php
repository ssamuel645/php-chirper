<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 2;

$chirp = $db->query('SELECT * FROM chirps WHERE id = :id', [
    'id' => $_POST['id']
])->findOrFail();

authorize($chirp['user_id'] === $currentUserId);

$db->query('DELETE FROM chirps WHERE id = :id', [
    'id' => $_POST['id']
]);

header('location: /chirps');
exit();
