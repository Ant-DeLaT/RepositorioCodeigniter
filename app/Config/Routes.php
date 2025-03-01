<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Home routes
$routes->get('/', 'Home::index');
$routes->get('/papapa', 'quicCont::getret');

// Authentication routes
$routes->get('/login', 'AuthController::login');
$routes->post('/login/process', 'AuthController::loginProcess');
$routes->get('/register', 'AuthController::register');
$routes->post('/register/process', 'AuthController::registerProcess');
$routes->get('/logout', 'AuthController::logout');

// Users routes
$routes->get('/users', 'UserController::index');
$routes->get('/users/save', 'UserController::saveUser');
$routes->get('/users/save/(:num)', 'UserController::saveUser/$1');
$routes->post('/users/save/', 'UserController::saveUser');
$routes->post('/users/save/(:num)', 'UserController::saveUser/$1');
$routes->get('/users/delete/(:num)', 'UserController::delete/$1');
$routes->get('/users/restore/(:num)', 'UserController::restore/$1');

// Activity routes
$routes->get('/act', 'ActivityController::index');
$routes->get('/act/save', 'ActivityController::index');
$routes->get('/act/save/(:num)', 'ActivityController::saveUser/$1');
$routes->post('/act/save/', 'ActivityController::saveUser');
$routes->post('/act/save/(:num)', 'ActivityController::saveUser/$1');
$routes->get('/act/delete/(:num)', 'ActivityController::delete/$1');
$routes->get('/act/restore/(:num)', 'ActivityController::restore/$1');

// Other routes
$routes->get('/metronic', 'UserController::metronic');
$routes->resource("CalendarController", ['only' => ['calendar', 'create', 'update', 'delete']]);
$routes->get("/About", "ExtraFunctions::About");
$routes->get("/FAQ", "ExtraFunctions::FAQ");
$routes->get('/exportExcel', 'ExtraFunctions::export');
$routes->get('/importExcel', 'ExtraFunctions::import');