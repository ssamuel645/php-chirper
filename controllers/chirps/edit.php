<?php

$heading = 'My Chirps';
$config = require 'config.php';
$db = new Database($config['database']);

$currentUserId = 2;

$chirp = $db->query(
    'select chirps.id as chirpId, content, user_id, name, email from chirps inner join users
    on chirps.user_id = users.id where chirpId = :chirpId;',
    [
        'chirpId' => $_GET['id']
    ]
)->findOrFail();

authorize($chirp['user_id'] === $currentUserId);

view('chirps/edit', compact('heading', 'chirp'));
