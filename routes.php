<?php

$router->get('/', 'index');

$router->get('/chirps', 'chirps/index');
$router->post('/chirps', 'chirps/store');
$router->get('/chirps/edit', 'chirps/edit');
$router->put('/chirps', 'chirps/update');
$router->delete('/chirps', 'chirps/destroy');
