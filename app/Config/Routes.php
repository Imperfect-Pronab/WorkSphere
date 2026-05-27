<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

$routes->get('/login', 'Auth\\LoginController::index');

$routes->post('/login/process', 'Auth\\LoginController::process');

$routes->get('/logout', 'Auth\\LoginController::logout');

$routes->get('/admin', 'Admin\\DashboardController::index', ['filter' => 'admin']);
