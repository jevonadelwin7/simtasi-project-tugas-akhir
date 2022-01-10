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
$routes->setDefaultController('Home');
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
//$routes->get('/', 'Home::index');

$routes->group('', ['filter' => 'AuthCheck'], function ($routes) {
    $routes->get('/mahasiswa', 'Mahasiswa::index');
    $routes->get('/mahasiswa/daftar_dosen', 'Mahasiswa::daftar_dosen');
    $routes->get('/mahasiswa/daftar_topik', 'Mahasiswa::daftar_topik');
    $routes->get('/mahasiswa/bimbingan', 'Mahasiswa::bimbingan');
    $routes->get('/mahasiswa/pendaftaran_seminar', 'Mahasiswa::pendaftaran_seminar');
    $routes->get('/mahasiswa/pendaftaran_sidang', 'Mahasiswa::pendaftaran_sidang');
    $routes->get('/mahasiswa/jadwal_seminar', 'Mahasiswa::jadwal_seminar');
    $routes->get('/mahasiswa/jadwal_sidang', 'Mahasiswa::jadwal_sidang');
    $routes->get('/mahasiswa/hasil_seminar', 'Mahasiswa::hasil_seminar');
    $routes->get('/mahasiswa/hasil_sidang', 'Mahasiswa::hasil_sidang');
});

$routes->group('', ['filter' => 'AuthCheckDosen'], function ($routes) {
    $routes->get('/dosen', 'Dosen::index');
    $routes->get('/admin', 'Admin::index');
    $routes->get('/dosen/request_mhs', 'Dosen::request_mhs');
    $routes->get('/dosen/isi_request', 'Dosen::isi_mhs');
    $routes->get('/dosen/bimbingan', 'Dosen::bimbingan');
    $routes->get('/admin/daftar_dosen', 'Admin::daftar_dosen');
    $routes->get('/admin/profile_dosen/', 'Admin::profile_dosen');
    $routes->get('/admin/daftar_mahasiswa', 'Admin::daftar_mahasiswa');
    $routes->get('/admin/request_mhs', 'Admin::request_mhs');
    $routes->get('/admin/bimbingan', 'Admin::bimbingan');
    $routes->get('/admin/pendaftaran', 'Admin::pendaftaran');
    $routes->get('/admin/jadwal', 'Admin::jadwal');
    $routes->get('/admin/nilai_mahasiswa', 'Admin::nilai_mahasiswa');
});

$routes->group('', ['filter' => 'AlreadyLoggedIn'], function ($routes) {
    $routes->get('/home', 'Home::index');
    $routes->get('/auth', 'Auth::index');
    $routes->get('/auth/admin', 'Auth::admin');
    $routes->get('/auth/register', 'Auth::register');
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
