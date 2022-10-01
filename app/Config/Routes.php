<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

/*
 * -------------------------------------------------------------------------------------------------------------------------------------------------------------------------
 *      Pelanggan
 * -------------------------------------------------------------------------------------------------------------------------------------------------------------------------
 */
$routes->get('/', 'Home::index',['filter'=> 'auth']);
$routes->get('/pelanggan', 'PelangganController::index',['filter'=> 'auth']);
$routes->get('/fpelanggan', 'PelangganController::create',['filter'=> 'auth']);
$routes->add('addPelanggan', 'PelangganController::save',['filter'=> 'auth']);
$routes->get('/pelanggan/delete/(:segment)','PelangganController::delete/$1',['filter'=> 'auth']);
$routes->add('/pelanggan/edit/(:segment)','PelangganController::edit/$1',['filter'=> 'auth']);

/*
 * -------------------------------------------------------------------------------------------------------------------------------------------------------------------------
 *      Paket
 * -------------------------------------------------------------------------------------------------------------------------------------------------------------------------
 */
$routes->get('/paket', 'PaketController::index',['filter'=> 'auth']);
$routes->get('/fpaket', 'PaketController::create',['filter'=> 'auth']);
$routes->add('addPaket', 'PaketController::save',['filter'=> 'auth']);
$routes->get('/paket/delete/(:segment)','PaketController::delete/$1',['filter'=> 'auth']);
$routes->add('/paket/edit/(:segment)','PaketController::edit/$1',['filter'=> 'auth']);

/*
 * -------------------------------------------------------------------------------------------------------------------------------------------------------------------------
 *      User
 * -------------------------------------------------------------------------------------------------------------------------------------------------------------------------
 */
$routes->get('/user', 'UserController::index');
$routes->get('/fuser', 'UserController::create');
$routes->add('addUser', 'UserController::save');
$routes->get('/user/delete/(:segment)','UserController::delete/$1');
$routes->add('/user/edit/(:segment)','UserController::edit/$1');

/*
 * -------------------------------------------------------------------------------------------------------------------------------------------------------------------------
 *      Login
 * -------------------------------------------------------------------------------------------------------------------------------------------------------------------------
 */
$routes->get('/login', 'LoginController::index');
$routes->add('addlogin', 'LoginController::login');

/*
 * -------------------------------------------------------------------------------------------------------------------------------------------------------------------------
 *      Logout
 * -------------------------------------------------------------------------------------------------------------------------------------------------------------------------
 */
$routes->get('/logout', 'LoginController::logout');

/*
 * -------------------------------------------------------------------------------------------------------------------------------------------------------------------------
 *      Transaksi
 * -------------------------------------------------------------------------------------------------------------------------------------------------------------------------
 */
$routes->get('/transaksi', 'TransaksiController::index',['filter'=> 'auth']);

$routes->add('addCart','TransaksiController::addCart',['filter'=> 'auth']);

$routes->get('/transaksi/hapus/(:segment)','TransaksiController::removeCart/$1',['filter'=> 'auth']);
$routes->add('psimpan','TransaksiController::simpan',['filter'=> 'auth']);

$routes->get('/laporan','TransaksiController::laporan');
$routes->get('/transaksi/detail/(:segment)','TransaksiController::detail/$1');
$routes->get('/laporan','TransaksiController::laporan');

$routes->add('/laporan/filter','TransaksiController::filter');

$routes->get('/transaksi/ambil/(:segment)','TransaksiController::ambil/$1');
$routes->get('/laporan/hapus/(:segment)','TransaksiController::hapus/$1');

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
