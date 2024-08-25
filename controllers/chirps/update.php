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

if (! empty($errors)) {
    $chirps = $db->query('select chirps.id as chirpId, content, name, email
from chirps inner join users on chirps.user_id = users.id where user_id = :user_id;', [
        'user_id' => $currentUserId
    ])->get();


    return view('chirps/edit', compact('heading', 'errors'));
}

$db->query('UPDATE chirps SET content = :content WHERE id = :id', [
    'content' => $_POST['content'],
    'id' => $_POST['id']
]);

view('chirps/index', compact('heading', 'chirps'));
