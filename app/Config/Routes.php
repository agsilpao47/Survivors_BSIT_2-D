<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Auth::index');
$routes->get('/login', 'Auth::index');
$routes->post('/auth', 'Auth::auth');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/logout', 'Auth::logout');

// User Acounts routes

$routes->get('/users', 'Users::index');
$routes->post('users/save', 'Users::save');
$routes->get('users/edit/(:segment)', 'Users::edit/$1');
$routes->post('users/update', 'Users::update');
$routes->delete('users/delete/(:num)', 'Users::delete/$1');
$routes->post('users/fetchRecords', 'Users::fetchRecords');

// Users Favorite Game's routes

$routes->get('/games', 'Games::index');
$routes->post('games/save', 'Games::save');
$routes->get('games/edit/(:segment)', 'Games::edit/$1');
$routes->post('games/update', 'Games::update');
$routes->delete('games/delete/(:num)', 'Games::delete/$1');
$routes->post('games/fetchRecords', 'Games::fetchRecords');

// Student routes

$routes->get('/student', 'Student::index');
$routes->post('student/save', 'Student::save');
$routes->get('student/edit/(:segment)', 'Student::edit/$1');
$routes->post('student/update', 'Student::update');
$routes->delete('student/delete/(:num)', 'Student::delete/$1');
$routes->post('student/fetchRecords', 'Student::fetchRecords');

// Books CRUD routes
$routes->get('books', 'Books::index');
$routes->get('books/create', 'Books::create');
$routes->post('books/store', 'Books::store');
$routes->get('books/show/(:num)', 'Books::show/$1');
$routes->get('books/edit/(:num)', 'Books::edit/$1');
$routes->post('books/update/(:num)', 'Books::update/$1');
$routes->get('books/delete/(:num)', 'Books::delete/$1');

// Logs routes for admin
$routes->get('/log', 'Logs::log');