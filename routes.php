<?php

$router->get('/', 'index');

$router->get('/login', 'session/create')->only('guest');
$router->post('/login', 'session/store')->only('guest');
$router->delete('/login', 'session/destroy')->only('auth');

$router->get('/register', 'users/create')->only('guest');
$router->post('/register', 'users/store')->only('guest');

$router->get('/chirps', 'chirps/index')->only('auth');
$router->post('/chirps', 'chirps/store')->only('auth');
$router->get('/chirps/edit', 'chirps/edit')->only('auth');
$router->patch('/chirps', 'chirps/update')->only('auth');
$router->delete('/chirps', 'chirps/destroy')->only('auth');
