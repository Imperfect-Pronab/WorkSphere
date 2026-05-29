<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
// Default Route

$routes->get('/', 'Home::index');

// Login Route for Admin and HR

$routes->get('/login', 'Auth\\LoginController::index');
$routes->post('/login/process', 'Auth\\LoginController::process');

// Admin and HR Dashboard

$routes->get('/admin/dashboard', 'Admin\\DashboardController::index', ['filter' => 'admin']);

// Admin Employees

$routes->get('/admin/employees', 'Admin\\EmployeeController::index', ['filter' => 'admin']);

// Get Hashed Password

$routes->get('/admin/getHashedPassword', 'Auth\\LoginController::getHashedPassword', ['filter' => 'admin']);
$routes->post('/admin/getHashedPassword', 'Auth\\LoginController::getHashedPasswordByAdmin', ['filter' => 'admin']);

// Admin Change Password

$routes->get('/admin/changePassword', 'Admin\\ChangePasswordController::changePassword', ['filter' => 'admin']);
$routes->post('/admin/changePassword', 'Admin\\ChangePasswordController::changePasswordByAdmin', ['filter' => 'admin']);

// Log Out route

$routes->get('/logout', 'Auth\\LoginController::logout');
