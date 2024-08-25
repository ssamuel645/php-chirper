<?php

use Core\App;
use Core\Validator;
use Core\Database;

$heading = 'Home';

$db = App::resolve(Database::class);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    if (! Validator::string($_POST['content'], 1, 255)) {
        $errors['content'] = 'Content of no more than 255 characters is required.';
    }

    if (empty($errors)) {
        $db->query('insert into chirps (content, user_id) values (:content, :user_id);', [
            'content' => $_POST['content'],
            'user_id' => 2
        ]);
    }
}

$chirps = $db->query('
select * from chirps inner join users
on chirps.user_id = users.id;
')->get();


view('index', compact('heading', 'chirps', 'errors'));
