<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ── Auth (publik) ─────────────────────────────────────────────────
$routes->get('/',           'AuthController::index');
$routes->get('auth',        'AuthController::index');
$routes->post('auth/login', 'AuthController::login');
$routes->get('auth/logout', 'AuthController::logout');
$routes->get('auth/forgot', 'AuthController::forgot');

// ── User area (harus login + role user) ──────────────────────────
$routes->group('user', ['filter' => 'auth:user'], function ($routes) {
    $routes->get('dashboard',         'UserController::dashboard');
    $routes->get('profile',           'UserController::profile');
    $routes->post('profile/update',   'UserController::updateProfile');
    $routes->post('profile/password', 'UserController::updatePassword');
});

// ── Admin area (harus login + role admin) ────────────────────────
$routes->group('admin', ['filter' => 'auth:admin'], function ($routes) {
    $routes->get('dashboard', 'AdminController::dashboard');

    // Placeholder – aktifkan saat modul siap
    // $routes->get('users',           'Admin\UserManageController::index');
    // $routes->get('users/create',    'Admin\UserManageController::create');
    // $routes->post('users/store',    'Admin\UserManageController::store');
    // $routes->get('users/edit/(:num)',   'Admin\UserManageController::edit/$1');
    // $routes->post('users/update/(:num)','Admin\UserManageController::update/$1');
    // $routes->get('users/delete/(:num)', 'Admin\UserManageController::delete/$1');

    // $routes->get('apps',            'Admin\AppsController::index');
    // $routes->get('access',          'Admin\AccessController::index');
});