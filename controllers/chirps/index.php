<?php

use Core\App;
use Core\Database;

$heading = 'My Chirps';
$db = App::resolve(Database::class);

$currentUserId = 2;

$chirps = $db->query('
select chirps.id as chirpId, content, name, email from chirps inner join users
on chirps.user_id = users.id where user_id = :user_id;
', ['user_id' => $currentUserId])->get();

view('chirps/index', compact('heading', 'chirps'));
