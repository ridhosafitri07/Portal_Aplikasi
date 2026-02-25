<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ── Auth (publik) ─────────────────────────────────────────────────
$routes->get('/',           'AuthController::index');
$routes->post('/',          'AuthController::login');
$routes->get('auth',        'AuthController::index');
$routes->post('auth/login', 'AuthController::login');
$routes->get('auth/logout', 'AuthController::logout');
$routes->get('auth/forgot', 'AuthController::forgot');

// ── Forgot Password (publik) ──────────────────────────────────────
$routes->get('forgot-password',          'ForgotPasswordController::index');
$routes->post('forgot-password/api/send-otp',  'ForgotPasswordController::sendOTP');
$routes->get('forgot-password/verify',   'ForgotPasswordController::verifyOTP');
$routes->post('forgot-password/verify',  'ForgotPasswordController::verifyOTP');
$routes->get('forgot-password/reset',    'ForgotPasswordController::resetPassword');
$routes->post('forgot-password/reset',   'ForgotPasswordController::resetPassword');
$routes->get('forgot-password/success',  'ForgotPasswordController::success');

// ── User area (harus login + role user) ──────────────────────────
$routes->group('user', ['filter' => 'auth:user'], function ($routes) {
    $routes->get('dashboard',         'UserController::dashboard');
    $routes->get('profile',           'UserController::profile');
    $routes->post('profile/update',   'UserController::updateProfile');
    $routes->post('profile/password', 'UserController::updatePassword');
});

// ── Admin area (harus login + role admin) ────────────────────────
$routes->group('admin', ['filter' => 'auth:admin'], function ($routes) {
    $routes->get('dashboard',                   'Admin\AdminController::index');

    // Profile Admin
    $routes->get('profile',                     'Admin\AdminController::profile');
    $routes->post('profile/update',             'Admin\AdminController::updateProfile');
    $routes->post('profile/password',           'Admin\AdminController::updatePassword');

    // Route untuk Admin - Group
    $routes->get('groups',                      'Admin\GroupController::index');
    $routes->post('groups/store',               'Admin\GroupController::store');
    $routes->post('groups/update/(:num)',       'Admin\GroupController::update/$1');
    $routes->get('groups/delete/(:num)',        'Admin\GroupController::delete/$1');

    // Route untuk Admin - Apps
    $routes->get('apps',                        'Admin\AppsController::index');
    $routes->post('apps/store',                 'Admin\AppsController::store');
    $routes->post('apps/update/(:num)',         'Admin\AppsController::update/$1');
    $routes->get('apps/delete/(:num)',          'Admin\AppsController::delete/$1');

    // Route untuk Admin - User
    $routes->get('users',                       'Admin\UserController::index');
    $routes->post('users/store',                'Admin\UserController::store');
    $routes->post('users/update/(:num)',        'Admin\UserController::update/$1');
    $routes->get('users/delete/(:num)',         'Admin\UserController::delete/$1');

    // Route untuk Admin - Access
    $routes->get('access',                      'Admin\AccessController::index');
    $routes->post('access/store',               'Admin\AccessController::store');
    $routes->get('access/delete/(:num)',        'Admin\AccessController::delete/$1');
});
