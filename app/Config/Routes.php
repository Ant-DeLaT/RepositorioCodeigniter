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
$routes->get('users', 'UserController::index');//Listar usuarios
$routes->get('users/save', 'UserController::saveUser'); //Mostrar formulario para crear usuario
$routes->get('users/save/(:num)', 'UserController::saveUser/$1'); //Mostrar formulario para editar usuario
$routes->get('users/save/', 'UserController::saveUser');// Crear usuario (POST)
$routes->get('users/save/(:num)', 'UserController::saveUser/$1'); //Editar usuario (POST)
$routes->get('users/delete(:num)', 'UserController::delete/$1'); //Eliminar usuario