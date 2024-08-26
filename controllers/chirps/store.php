<?php

use Core\App;
use Core\Validator;
use Core\Database;

$db = App::resolve(Database::class);

$errors = [];

if (! Validator::string($_POST['content'], 1, 255)) {
    $errors['content'] = 'Content of no more than 255 characters is required.';
}

if (empty($errors)) {
    $db->query('INSERT INTO chirps (content, user_id) VALUES (:content, :user_id)', [
        'content' => $_POST['content'],
        'user_id' => 2
    ]);
}

$chirps = $db
    ->query('SELECT * FROM chirps INNER JOIN users ON chirps.user_id = users.id')
    ->get();

view('index', [
    'heading' => 'Home',
    'chirps' => $chirps,
    'errors' => $errors
]);
