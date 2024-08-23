<?php

require 'functions.php';
require 'Database.php';
//require 'router.php';

$config = require 'config.php';
$db = new Database($config['database']);

$id = $_GET['id'];

$query = 'select * from chirps where id = :id';
$chirps = $db->query($query, [$id])->fetch();

dd($chirps);
