<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes(true);

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('login');
$routes->setTranslateURIDashes(true);
$routes->set404Override();
$routes->setAutoRoute(false);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Auth::login');

$routes->get('auth/login', 'Auth::login');
$routes->post('auth/proses_login', 'Auth::proses_login');

$routes->get('auth/logout', 'Auth::logout');

$routes->get('auth/register', 'Auth::register');
$routes->post('auth/proses_register', 'Auth::proses_register');

$routes->get('obat', 'Obat::index');
$routes->get('obat/create', 'Obat::create');
$routes->post('obat/store', 'Obat::store');
$routes->post('obat/update', 'Obat::update');
$routes->get('obat/edit/(:any)', 'Obat::edit/$1');
$routes->post('obat/update/(:any)', 'Obat::update/$1');
$routes->get('obat/delete/(:any)', 'Obat::delete/$1');

$routes->get('pasien', 'Pasien::index');
$routes->get('pasien/create', 'Pasien::create');
$routes->post('pasien/store', 'Pasien::store');
$routes->post('pasien/update', 'Pasien::update');
$routes->get('pasien/edit/(:any)', 'Pasien::edit/$1');
$routes->post('pasien/update/(:any)', 'Pasien::update/$1');
$routes->get('pasien/delete/(:any)', 'Pasien::delete/$1');

$routes->get('riwayat', 'Riwayat::index');
$routes->get('riwayat/create', 'Riwayat::create');
$routes->post('riwayat/store', 'Riwayat::store');
$routes->post('riwayat/update', 'Riwayat::update');
$routes->get('riwayat/edit/(:any)', 'Riwayat::edit/$1');
$routes->post('riwayat/update/(:any)', 'Riwayat::update/$1');
$routes->get('riwayat/delete/(:any)', 'Riwayat::delete/$1');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}