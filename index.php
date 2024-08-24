<?php

define('BASE_PATH', __DIR__ . '/');

require 'functions.php';
require 'Database.php';
require 'Response.php';
require 'router.php';

$config = require 'config.php';
$db = new Database($config['database']);
