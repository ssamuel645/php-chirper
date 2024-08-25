<?php

use Core\Database;

$heading = 'My Chirps';
$config = require base_path('config.php');
$db = new Database($config['database']);


$currentUserId = 2;

$chirp = $db->query(
    'select * from chirps where id = :id',
    [
        'id' => $_GET['id']
    ]
)->findOrFail();

if (authorize($chirp['user_id'] === $currentUserId)) {
    $db->query('delete from chirps where id = :id', [
        'id' => $chirp['chirpId']
    ]);
}

header('location: /notes');
exit();
