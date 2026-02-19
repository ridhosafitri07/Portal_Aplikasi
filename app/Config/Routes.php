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