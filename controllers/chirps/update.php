<?php

use Core\App;
use Core\Validator;
use Core\Database;

$heading = 'My Chirp';

$db = App::resolve(Database::class);
$currentUserId = 2;

$errors = [];
if (! Validator::string($_POST['content'], 1, 255)) {
    $errors['content'] = 'Content of no more than 255 characters is required.';
}

$chirp = $db->query('SELECT * FROM chirps WHERE id = :id', [
    'id' => $_POST['id']
])->findOrFail();

authorize($chirp['user_id'] === $currentUserId);

if (empty($errors)) {
    $db->query('UPDATE chirps SET content = :content WHERE id = :id', [
        'content' => $_POST['content'],
        'id' => $_POST['id']
    ]);

    header('location: /chirps');
    exit();
}

view('chirps/edit', [
    'heading' => 'Edit chirp',
    'chirp' => $chirp,
    'errors' => $errors
]);
