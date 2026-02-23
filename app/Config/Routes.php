<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Route untuk Admin - Group
$routes->get('/admin/groups', 'Admin\GroupController::index');
$routes->post('/admin/groups/store', 'Admin\GroupController::store');
$routes->post('/admin/groups/update/(:num)', 'Admin\GroupController::update/$1');
$routes->get('/admin/groups/delete/(:num)', 'Admin\GroupController::delete/$1');

// Route untuk Admin - Apps
$routes->get('/admin/apps', 'Admin\AppsController::index');
$routes->post('/admin/apps/store', 'Admin\AppsController::store');
$routes->post('/admin/apps/update/(:num)', 'Admin\AppsController::update/$1');
$routes->get('/admin/apps/delete/(:num)', 'Admin\AppsController::delete/$1');


// Route untuk Admin - User
$routes->get('/admin/users', 'Admin\UserController::index');
$routes->post('/admin/users/store', 'Admin\UserController::store');
$routes->post('/admin/users/update/(:num)', 'Admin\UserController::update/$1');
$routes->get('/admin/users/delete/(:num)', 'Admin\UserController::delete/$1');


// Route untuk Admin - Access
$routes->get('/admin/access', 'Admin\AccessController::index');
$routes->post('/admin/access/store', 'Admin\AccessController::store');
$routes->get('/admin/access/delete/(:num)', 'Admin\AccessController::delete/$1');



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
      $routes->get('dashboard', 'Admin\AdminController::index');

       // Profile Admin
    $routes->get('profile',           'Admin\AdminController::profile');
    $routes->post('profile/update',   'Admin\AdminController::updateProfile');
    $routes->post('profile/password', 'Admin\AdminController::updatePassword');
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
