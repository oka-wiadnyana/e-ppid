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
$routes->get('/', 'Dashboard::index');
$routes->add('administrator', 'Admineppid::index', ['filter' => 'adminauth']);


$routes->group('userpage', ['filter' => 'userauth'], function ($routes) {
    // $routes->add('', 'Userpage::index');
    $routes->add('v_permohonan', 'Userpage::v_permohonan');
    $routes->add('v_tambah_permohonan', 'Userpage::v_tambah_permohonan');
    $routes->add('insert_permohonan', 'Userpage::insert_permohonan');
    $routes->add('download_file_permohonan/(:any)', 'Userpage::download_file_permohonan/$1');
    $routes->add('edit_permohonan', 'Userpage::edit_permohonan');
    $routes->add('delete_permohonan', 'Userpage::delete_permohonan');
    $routes->add('logout', 'Userpage::logout');
});

$routes->group('pengaduan', ['filter' => 'aduauth'], function ($routes) {
    $routes->add('v_pengaduan', 'Pengaduan::v_pengaduan');
    $routes->add('v_form', 'Pengaduan::v_form');
    $routes->add('insert_pengaduan', 'Pengaduan::insert_pengaduan');
    $routes->add('download/(:any)', 'Pengaduan::download/$1');
    $routes->add('edit_data', 'Pengaduan::edit_data');
    $routes->add('hapus_pengaduan', 'Pengaduan::hapus_pengaduan');
    $routes->add('logout', 'Pengaduan::logout');
});

$routes->group('admineppid', ['filter' => 'adminauth'], function ($routes) {
    $routes->add('/', 'Admineppid::index');
    $routes->add('list_informasi', 'Admineppid::list_informasi');
    $routes->add('edit_link', 'Admineppid::edit_link');
    $routes->add('delete_link', 'Admineppid::delete_link');
    $routes->add('list_video', 'Admineppid::list_video');
    $routes->add('edit_video', 'Admineppid::edit_video');
    $routes->add('delete_video', 'Admineppid::delete_video');
    $routes->add('tambah_video', 'Admineppid::tambah_video');
    $routes->add('v_level1', 'Admineppid::v_level1');
    $routes->add('edit_level1', 'Admineppid::edit_level1');
    $routes->add('delete_level1', 'Admineppid::delete_level1');
    $routes->add('tambah_level1', 'Admineppid::tambah_level1');
    $routes->add('v_level2', 'Admineppid::v_level2');
    $routes->add('edit_level2', 'Admineppid::edit_level2');
    $routes->add('tambah_level2', 'Admineppid::tambah_level2');
    $routes->add('delete_level2', 'Admineppid::delete_level2');
    $routes->add('v_level3', 'Admineppid::v_level3');
    $routes->add('tambah_level3', 'Admineppid::tambah_level3');
    $routes->add('edit_level3', 'Admineppid::edit_level3');
    $routes->add('delete_level3', 'Admineppid::delete_level3');
    $routes->add('tambah_link', 'Admineppid::tambah_link');
    $routes->add('insert_link', 'Admineppid::insert_link');
    $routes->add('v_profil_ppid', 'Admineppid::v_profil_ppid');
    $routes->add('manipulate_profil_ppid', 'Admineppid::manipulate_profil_ppid');
    $routes->add('insert_profil_ppid', 'Admineppid::insert_profil_ppid');
    $routes->add('v_profil_satker', 'Admineppid::v_profil_satker');
    $routes->add('manipulate_profil_satker', 'Admineppid::manipulate_profil_satker');
    $routes->add('daftar_permohonan', 'Admineppid::daftar_permohonan');
    $routes->add('proses_permohonan', 'Admineppid::proses_permohonan');
    $routes->add('tolak_permohonan', 'Admineppid::tolak_permohonan');
    $routes->add('delete_permohonan', 'Admineppid::delete_permohonan');
    $routes->add('daftar_keberatan', 'Admineppid::daftar_keberatan');
    $routes->add('proses_keberatan', 'Admineppid::proses_keberatan');
    $routes->add('v_peraturan', 'Admineppid::v_peraturan');
    $routes->add('tambah_peraturan', 'Admineppid::tambah_peraturan');
    $routes->add('insert_peraturan', 'Admineppid::insert_peraturan');
    $routes->add('delete_peraturan', 'Admineppid::delete_peraturan');
    $routes->add('edit_peraturan', 'Admineppid::edit_peraturan');
    $routes->add('v_standar_pelayanan', 'Admineppid::v_standar_pelayanan');
    $routes->add('tambah_standar_pelayanan', 'Admineppid::tambah_standar_pelayanan');
    $routes->add('insert_standar_pelayanan', 'Admineppid::insert_standar_pelayanan');
    $routes->add('edit_standar_pelayanan', 'Admineppid::edit_standar_pelayanan');
    $routes->add('v_statistik', 'Admineppid::v_statistik');
    $routes->add('insert_statistik', 'Admineppid::insert_statistik');
    $routes->add('edit_statistik', 'Admineppid::edit_statistik');
    $routes->add('delete_statistik', 'Admineppid::delete_statistik');
    $routes->add('v_laporan_layanan', 'Admineppid::v_laporan_layanan');
    $routes->add('tambah_laporan', 'Admineppid::tambah_laporan');
    $routes->add('insert_laporan', 'Admineppid::insert_laporan');
    $routes->add('edit_laporan', 'Admineppid::edit_laporan');
    $routes->add('delete_laporan', 'Admineppid::delete_laporan');
    $routes->add('file_check_laporan/(:any)', 'Admineppid::file_check_laporan/$1');
    $routes->add('v_prasyarat', 'Admineppid::v_prasyarat');
    $routes->add('manipulate_prasyarat', 'Admineppid::manipulate_prasyarat');
    $routes->add('insert_prasyarat', 'Admineppid::insert_prasyarat');
    $routes->add('v_link_terkait', 'Admineppid::v_link_terkait');
    $routes->add('tambah_link_terkait', 'Admineppid::tambah_link_terkait');
    $routes->add('insert_link_terkait', 'Admineppid::insert_link_terkait');
    $routes->add('delete_link_terkait', 'Admineppid::delete_link_terkait');
    $routes->add('edit_link_terkait', 'Admineppid::edit_link_terkait');
    $routes->add('v_layanan_elektronik', 'Admineppid::v_layanan_elektronik');
    $routes->add('tambah_layanan_elektronik', 'Admineppid::tambah_layanan_elektronik');
    $routes->add('insert_layanan_elektronik', 'Admineppid::insert_layanan_elektronik');
    $routes->add('edit_layanan_elektronik', 'Admineppid::edit_layanan_elektronik');
    $routes->add('delete_layanan_elektronik', 'Admineppid::delete_layanan_elektronik');
    $routes->add('logout', 'Admineppid::logout');
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
