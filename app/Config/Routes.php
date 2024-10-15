<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->add('/login', 'Home::login');
$routes->post('changeLanguage/(:any)', 'Home::change_language/$1');
$routes->get('logout', 'Home::logout');
$routes->get('createAdmin', 'User::create_admin');
$routes->add('/saveAdmin', 'User::create_admin');
$routes->get('manageCustomer', 'User::get_customer');
$routes->add('changeCustomerStatus', 'User::change_customer_status',['get', 'post']);
