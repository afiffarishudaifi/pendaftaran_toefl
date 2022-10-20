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
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Login::index');
$routes->get('/Login/resetPassword', 'Login::resetPassword');
$routes->get('/Login', 'Login::index');
$routes->get('/Login/registrasiMahasiswa', 'Login::registrasiMahasiswa');
$routes->post('/Login/loginSistem', 'Login::loginSistem');
$routes->post('/Login/loginSistemAdmin', 'Login::loginSistemAdmin');
$routes->post('/Login/simpanMahasiswa', 'Login::simpanMahasiswa');
$routes->get('/Login/loginAdmin', 'Login::loginAdmin');

// bagian mahasiswa
$routes->get('/Mahasiswa/Dashboard', 'Login::registrasiMahasiswa');


// bagian admin
$routes->get('/Admin/Dashboard', 'Admin\Dashboard::index');

// admin admin
$routes->get('/Admin/Admin', 'Admin\Admin::index');
$routes->post('/Admin/Admin/add_admin', 'Admin\Admin::add_admin');
$routes->post('/Admin/Admin/update_admin', 'Admin\Admin::update_admin');
$routes->post('/Admin/Admin/delete_admin', 'Admin\Admin::delete_admin');
$routes->get('/Admin/Admin/cek_username/(:any)', 'Admin\Admin::cek_username/$1');
$routes->get('/Admin/Admin/data_edit/(:any)', 'Admin\Admin::data_edit/$1');

// admin jenis
$routes->get('/Admin/Jenis', 'Admin\Jenis::index');
$routes->post('/Admin/Jenis/add_jenis', 'Admin\Jenis::add_jenis');
$routes->post('/Admin/Jenis/update_jenis', 'Admin\Jenis::update_jenis');
$routes->post('/Admin/Jenis/delete_jenis', 'Admin\Jenis::delete_jenis');
$routes->get('/Admin/Jenis/cek_nama/(:any)', 'Admin\Jenis::cek_nama/$1');
$routes->get('/Admin/Jenis/data_edit/(:any)', 'Admin\Jenis::data_edit/$1');

// admin periode
$routes->get('/Admin/Periode', 'Admin\Periode::index');
$routes->post('/Admin/Periode/add_periode', 'Admin\Periode::add_periode');
$routes->post('/Admin/Periode/update_periode', 'Admin\Periode::update_periode');
$routes->post('/Admin/Periode/delete_periode', 'Admin\Periode::delete_periode');
$routes->get('/Admin/Periode/cek_nama/(:any)', 'Admin\Periode::cek_nama/$1');
$routes->get('/Admin/Periode/data_edit/(:any)', 'Admin\Periode::data_edit/$1');

// admin pendaftar
$routes->get('/Admin/Pendaftar', 'Admin\Pendaftar::index');
$routes->post('/Admin/Pendaftar/add_pendaftar', 'Admin\Pendaftar::add_pendaftar');
$routes->post('/Admin/Pendaftar/update_pendaftar', 'Admin\Pendaftar::update_pendaftar');
$routes->post('/Admin/Pendaftar/delete_pendaftar', 'Admin\Pendaftar::delete_pendaftar');
$routes->get('/Admin/Pendaftar/cek_nama/(:any)', 'Admin\Pendaftar::cek_nama/$1');
$routes->get('/Admin/Pendaftar/data_edit/(:any)', 'Admin\Pendaftar::data_edit/$1');

// admin jadwal
$routes->get('/Admin/Jadwal', 'Admin\Jadwal::index');
$routes->post('/Admin/Jadwal/add_jadwal', 'Admin\Jadwal::add_jadwal');
$routes->post('/Admin/Jadwal/update_jadwal', 'Admin\Jadwal::update_jadwal');
$routes->post('/Admin/Jadwal/delete_jadwal', 'Admin\Jadwal::delete_jadwal');
$routes->get('/Admin/Jadwal/cek_nama/(:any)', 'Admin\Jadwal::cek_nama/$1');
$routes->get('/Admin/Jadwal/data_edit/(:any)', 'Admin\Jadwal::data_edit/$1');
$routes->post('/Admin/Jadwal/data_jenis', 'Admin\Jadwal::data_jenis');
$routes->post('/Admin/Jadwal/data_periode', 'Admin\Jadwal::data_periode');

// admin test
$routes->get('/Admin/Test', 'Admin\Test::index');
$routes->post('/Admin/Test/add_test', 'Admin\Test::add_test');
$routes->post('/Admin/Test/update_test', 'Admin\Test::update_test');
$routes->post('/Admin/Test/delete_test', 'Admin\Test::delete_test');
$routes->get('/Admin/Test/cek_nama/(:any)', 'Admin\Test::cek_nama/$1');
$routes->get('/Admin/Test/data_edit/(:any)', 'Admin\Test::data_edit/$1');
$routes->get('/Admin/Test/detail_test/(:any)', 'Admin\Test::detail_test/$1');
$routes->post('/Admin/Test/data_pendaftar', 'Admin\Test::data_pendaftar');

// admin riwayat test
$routes->get('/Admin/RiwayatTest', 'Admin\RiwayatTest::index');
$routes->post('/Admin/RiwayatTest/add_test', 'Admin\RiwayatTest::add_test');
$routes->post('/Admin/RiwayatTest/update_test', 'Admin\RiwayatTest::update_test');
$routes->post('/Admin/RiwayatTest/delete_test', 'Admin\RiwayatTest::delete_test');
$routes->get('/Admin/RiwayatTest/cek_nama/(:any)', 'Admin\RiwayatTest::cek_nama/$1');
$routes->get('/Admin/RiwayatTest/data_edit/(:any)', 'Admin\RiwayatTest::data_edit/$1');
$routes->get('/Admin/RiwayatTest/detail_test/(:any)', 'Admin\RiwayatTest::detail_test/$1');
$routes->post('/Admin/RiwayatTest/data_pendaftar', 'Admin\RiwayatTest::data_pendaftar');

// admin laporan
$routes->get('/Admin/LaporanToefl', 'Admin\LaporanToefl::index');
$routes->get('Admin/LaporanToefl/data/(:any)', 'Admin\LaporanToefl::data/$1');
$routes->post('Admin/LaporanToefl/data_cetak', 'Admin\LaporanToefl::data_cetak');
$routes->post('/Admin/LaporanToefl/data_jadwal', 'Admin\LaporanToefl::data_jadwal');

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
