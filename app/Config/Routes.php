<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
$routes->setAutoRoute(true); //kasi mati kalau udah selesai dev

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->add('/', 'Home::dashboard');



//ini route nya controller admin
$routes->add('/admin/saveUser', 'admin::saveUser', ['filter' => 'role:admin']);
$routes->add('/admin', 'admin::index', ['filter' => 'role:admin']);
$routes->add('/admin/index', 'admin::index', ['filter' => 'role:admin']);
$routes->add('/admin/detail/(:num)', 'admin::$1', ['filter' => 'role:admin']);
$routes->add('/admin/(:num)', 'admin::detail/$1', ['filter' => 'role:admin']);
$routes->add('/admin/add', 'admin::add', ['filter' => 'role:admin']);
$routes->add('/admin/ubah/(:num)', 'admin::ubah/$1', ['filter' => 'role:admin']);
$routes->add('/admin/ubah_foto/(:num)', 'admin::ubah_foto/$1', ['filter' => 'role:admin']);
$routes->add('/admin/save_user/(:num)', 'admin::save_user/$1', ['filter' => 'role:admin']);
$routes->add('/admin/hapus/(:num)', 'admin::hapus/$1', ['filter' => 'role:admin']);
$routes->add('/admin/hapus_lokasi/(:num)', 'admin::hapus_lokasi/$1', ['filter' => 'role:admin']);
$routes->add('/admin/addlok', 'admin::addlok', ['filter' => 'role:admin']);
$routes->add('/admin/savelok', 'admin::savelok', ['filter' => 'role:admin']);
$routes->add('/admin/jabatan/(:num)', 'admin::jabatan/$1', ['filter' => 'role:admin']);
$routes->add('/admin/simpan_jabatan/(:num)', 'admin::simpan_jabatan/$1', ['filter' => 'role:admin']);


//ini routenya controller laporan
$routes->add('/print', 'laporan::index', ['filter' => 'role:user']);
$routes->add('/laporan/index', 'laporan::index', ['filter' => 'role:user']);
$routes->add('/laporan/filterData', 'laporan::filterData', ['filter' => 'role:user']);
$routes->add('/laporan/filterFoto', 'laporan::filterFoto', ['filter' => 'role:user']);
$routes->add('/laporan/print_laporan_berhalangan', 'laporan::print_laporan_berhalangan');
$routes->add('/laporan/print_data_berhalangan', 'laporan::print_data_berhalangan');


//ini routenya controller THL
$routes->add('/thl/selesai_thl', 'thl::selesai_thl');
$routes->add('/thl', 'thl::index');
$routes->add('/thl/index', 'thl::index');
$routes->add('/thl/laporan', 'thl::laporan');
$routes->add('/thl/buat_kerja/(:num)', 'thl::buat_kerja/$1');
$routes->add('/thl/save_mulai/(:num)', 'thl::save_mulai/$1');
$routes->add('/thl/mulai2', 'thl::mulai2');
$routes->add('/thl/selesai_kerja/(:num)', 'thl::selesai_kerja/$1');
$routes->add('/thl/selesai/(:num)', 'thl::selesai/$1');
$routes->add('/thl/detail_riwayat/(:num)', 'thl::detail_riwayat/$1');
$routes->add('/thl/acc_kerja/(:num)', 'thl::acc_kerja/$1');
$routes->add('/thl/acc_kerja_ubah/(:num)', 'thl::acc_kerja_ubah/$1');
$routes->add('/thl/konfirmasi_kesalahan/(:num)', 'thl::konfirmasi_kesalahan/$1');
$routes->add('/thl/unacc_kinerja/(:num)', 'thl::unacc_kinerja/$1');
$routes->add('/thl/laporan_disetujui', 'thl::laporan_disetujui');
$routes->add('/thl/detail_riwayat_disetujui/(:num)', 'thl::detail_riwayat_disetujui/$1');
$routes->add('/thl/laporan_tidak_disetujui', 'thl::laporan_tidak_disetujui');
$routes->add('/thl/detail_riwayat_tidak_disetujui/(:num)', 'thl::detail_riwayat_tidak_disetujui/$1');
$routes->add('/thl/ubah_riwayat/(:num)', 'thl::ubah_riwayat/$1');
$routes->add('/thl/update_riwayat_jalur', 'thl::update_riwayat_jalur');
$routes->add('/thl/update_riwayat_foto', 'thl::update_riwayat_foto');
$routes->add('/thl/tidak_kerja/(:num)', 'thl::tidak_kerja/$1');
$routes->add('/thl/simpan_laporan/(:num)', 'thl::simpan_laporan/$1');
$routes->add('/thl/THL_berhalangan', 'thl::THL_berhalangan');
$routes->add('/thl/detail_berhalangan/(:num)', 'thl::detail_berhalangan/$1');
$routes->add('/thl/selesai_kerja', 'thl::selesai_kerja');
$routes->add('/thl/simpan_laporan_berhalangan', 'thl::simpan_laporan_berhalangan');
$routes->add('/thl/tidak_setujui_laporan_berhalangan', 'thl::tidak_setujui_laporan_berhalangan');

//ini route nya controller ubah
$routes->add('/ubah/(:num)', 'ubah::foto/$1');
$routes->add('/ubah/foto/(:num)', 'ubah::foto/$1');
$routes->add('/ubah/save/(:num)', 'ubah::save/$1');

//ini routenya controller user
// $routes->add('/user/add', 'user::add');
$routes->add('/user/index', 'user::index');
$routes->add('/user', 'user::index');
$routes->add('/user/ubah/(:num)', 'user::ubah/$1');
$routes->add('/user/save_user/(:num)', 'user::save_user/$1');
$routes->add('/user/datathl', 'user::datathl');
$routes->add('/user/detail/(:num)', 'user::detail/$1');
$routes->add('/user/(:num)', 'user::detail/$1');
$routes->add('/user/ubahthl/(:num)', 'user::ubahthl/$1');
$routes->add('/user/savethl', 'user::savethl');
$routes->add('/user/print_laporan', 'user::print_laporan');
$routes->add('/user/Daftar_anggota_berhalangan', 'user::Daftar_anggota_berhalangan');
$routes->add('/user/detail_laporan_berhalangan/(:num)', 'user::detail_laporan_berhalangan/$1');
$routes->add('/user/anggota_berhalangan', 'user::anggota_berhalangan');
$routes->add('/user/detail_berhalangan/(:num)', 'user::detail_berhalangan/$1');


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
