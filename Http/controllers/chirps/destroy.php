<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);


$chirp = $db->query('SELECT * FROM chirps WHERE id = :id', [
    'id' => $_POST['id']
])->findOrFail();

authorize($chirp['user_id'] === $_SESSION['user']['id']);

$db->query('DELETE FROM chirps WHERE id = :id', [
    'id' => $_POST['id']
]);

header('location: /chirps');
exit();
