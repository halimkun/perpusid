<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Pages');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Pages::index');

// Admin Routes
$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/index', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/buku', 'Admin::buku', ['filter' => 'role:admin']);
$routes->get('/admin/buku/new', 'Admin::buku_baru', ['filter' => 'role:admin']);
$routes->get('/admin/buku/detail/(:any)', 'Admin::buku_detail/$1', ['filter' => 'role:admin']);
$routes->get('/admin/buku/edit/(:any)', 'Admin::buku_edit/$1', ['filter' => 'role:admin']);
$routes->get('/admin/buku/kategori', 'Admin::kategori', ['filter' => 'role:admin']);
$routes->get('/admin/users', 'Admin::users', ['filter' => 'role:admin']);
$routes->get('/admin/user/new', 'Admin::user_new', ['filter' => 'role:admin']);
$routes->get('/admin/user/group', 'Admin::group', ['filter' => 'role:admin']);


$routes->patch('/groups/update', 'Groups::update');
$routes->delete('/groups/delete', 'Groups::delete');

// User Routes
$routes->get('/u', 'Anggota::index'); // index
$routes->get('/u/dashboard', 'Anggota::dashboard'); // dashboard
$routes->get('/u/books', 'Anggota::books'); // dashboard
$routes->get('/u/(:any)', 'Anggota::profile/$1'); // profile

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
