<?php

return [
    '/' => 'controllers/index.php',

    '/chirps' => 'controllers/chirps/index.php',
    '/chirps/edit' => 'controllers/chirps/edit.php',
    '/chirps/create' => 'controllers/chirps/store.php'
];

$router->get('/', 'index.php');

$router->get('/chirps', 'chirps/index.php');
$router->post('/chirps', 'chirps/store.php');
$router->get('/chirps', 'chirps/edit.php');
$router->get('/chirps', 'chirps/destroy.php');
