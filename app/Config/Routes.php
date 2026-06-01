<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
// Default Route

$routes->get('/', 'Home::index');

// Login Route for Admin and HR

$routes->get('/login', 'Auth\LoginController::index');
$routes->post('/login/process', 'Auth\LoginController::process');

// Admin

$routes->group('admin', ['filter' => 'admin'], function ($routes) {

    // Dashboard
    $routes->get('dashboard', 'Admin\DashboardController::index');

    // Employees
    $routes->get('employees', 'Admin\EmployeeController::index');

    // Get Hashed Password
    $routes->get('getHashedPassword', 'Auth\LoginController::getHashedPassword');
    $routes->post('getHashedPassword', 'Auth\LoginController::getHashedPasswordByAdmin');

    // Change Password
    $routes->get('changePassword', 'Admin\ChangePasswordController::changePassword');
    $routes->post('changePassword', 'Admin\ChangePasswordController::changePasswordByAdmin');
});

// HR

$routes->group('hr', ['filter' => 'hr'], function ($routes) {

    // Dashboard
    $routes->get('dashboard', 'HR\DashboardController::index');

    // Employees
    $routes->get('employees', 'HR\EmployeeController::index');

    // Change Password
    $routes->get('changePassword', 'HR\ChangePasswordController::changePassword');
    $routes->post('changePassword', 'HR\ChangePasswordController::changePasswordByAdmin');
});

// Log Out route

$routes->get('/logout', 'Auth\LoginController::logout');
