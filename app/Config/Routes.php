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
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// all
$routes->get('/', 'Home::index');
// penyakit
$routes->get('/penyakit', 'Penyakit::index');
$routes->get('/penyakit/(:segment)', 'Penyakit::detailpenyakit/$1');
// diagnosa
$routes->get('/diagnosa', 'Diagnosa::index');
$routes->post('/diagnosa/save', 'Diagnosa::save');
$routes->post('/diagnosa/autogejala', 'Diagnosa::autogejala');
$routes->get('/diagnosa/(:segment)', 'Diagnosa::hasil/$1');
// riwayat
$routes->get('/riwayat', 'Riwayat::index');
$routes->get('/riwayat/(:segment)', 'Riwayat::detail/$1');
// pengembang
$routes->get('/pengembang', 'Pengembang::index');
// bantuan
$routes->get('/bantuan', 'Bantuan::index');


// admin
$routes->group('admin', ['filter' => 'role:admin'], static function ($routes) {
    // Dashboard
    $routes->get('/', 'Admin\Dashboard::index');
    // Info akun
    $routes->get('profile', 'Admin\Profile::index');
    $routes->post('profile/update', 'Admin\Profile::update');
    $routes->post('profile/changepass', 'Admin\Profile::changePassword');
    // List Akun
    $routes->get('akun', 'Admin\Akun::index');
    $routes->get('akun/create', 'Admin\Akun::create');
    $routes->post('akun/(:segment)', 'Admin\Akun::changeActive/$1');
    $routes->delete('akun/(:num)', 'Admin\Akun::delete/$1');
    // list penyakit
    $routes->get('penyakit', 'Admin\Penyakit::index');
    $routes->post('penyakit/autodata', 'Admin\Penyakit::autodata');
    $routes->post('penyakit/allgejala', 'Admin\Penyakit::allgejala');
    $routes->get('penyakit/(:segment)', 'Admin\Penyakit::edit/$1');
    $routes->post('penyakit/update/(:segment)', 'Admin\Penyakit::update/$1');
    // list gejala
    $routes->get('gejala', 'Admin\Gejala::index');
    $routes->post('gejala/autodata', 'Admin\Gejala::autodata');
    $routes->post('gejala/autosave', 'Admin\Gejala::autosave');
    $routes->post('gejala/autoupdate', 'Admin\Gejala::autoupdate');
    $routes->post('gejala/autodelete', 'Admin\Gejala::autodelete');
    $routes->post('gejala/autoallgejala', 'Admin\Gejala::autoallgejala');
    // Basis Pengetahuan
    $routes->get('basisp', 'Admin\BasisP::index');
    $routes->post('basisp/basisbaru', 'Admin\BasisP::basisbaru');
    $routes->post('basisp/reloadg', 'Admin\BasisP::reloadg');
    $routes->post('basisp/autodelete', 'Admin\BasisP::autodelete');
    // List User
    $routes->get('pengguna', 'Admin\Pengguna::index');
    // Riwayat User
    $routes->get('riwayat_pengguna', 'Admin\Riwayat_pengguna::index');
});



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
