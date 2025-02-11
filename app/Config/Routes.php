<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// RUTAS DEL INDEX; NO BORRAR, DESCOMENTAR SI SE QUIEREN USAR
$routes->get('/', 'Home::index');
$routes->get('home', 'Home::index');
// RECUERDA USAR RUTAS "RELATIVAS" EN EL NAVEGADOR
$routes->get('home/getUsers','Home::getUsers');
$routes->get('home/create','Home::create');
$routes->post('home/create','Home::create');


// RUTAS USERS
$routes->get('/users', 'UserController::index');//Listar usuarios
$routes->get('/users/save', 'UserController::saveUser'); //Mostrar formulario para crear usuario
$routes->get('/users/save/(:num)', 'UserController::saveUser/$1'); //Mostrar formulario para editar usuario
$routes->post('/users/save/', 'UserController::saveUser');// Crear usuario (POST)
$routes->post('/users/save/(:num)', 'UserController::saveUser/$1'); //Editar usuario (POST)
$routes->get('/users/delete/(:num)', 'UserController::delete/$1'); //Eliminar usuario
$routes->get('/users/restore/(:num)','UserController::restore/$1'); //deletes "deleted_at"; MUST BE FIXED

// PROCESAR LOGIN/REGISTER
$routes->get('/login', 'AuthController::login'); //Login page
// $routes->get('/logina', 'AuthController::logina'); //Second login; TEMP
$routes->post('/login/process', 'AuthController::loginProcess'); //Process login
$routes->get('/register', 'AuthController::register');//Página de registro
// $routes->get('/registera', 'AuthController::registera'); //Second register; TEMP
$routes->post('/register/process', 'AuthController::registerProcess'); //Procesar registro
$routes->get('/logout', 'AuthController::logout'); //Cerrar sesión


$routes->get('/exportExcel', 'ExcelProcessor::export'); // Exports excel 
$routes->get('/importExcel', 'ExcelProcessor::import'); // Imports information from excels