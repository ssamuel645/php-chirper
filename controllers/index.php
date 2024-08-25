<?php

use Core\Database;

$heading = 'Home';

$config = require base_path('config.php');
$db = new Database($config['database']);

$chirps = $db->query('
select * from chirps inner join users
on chirps.user_id = users.id;
')->get();

view('index', compact('heading', 'chirps'));
