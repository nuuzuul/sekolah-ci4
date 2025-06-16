<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/penerimaan', 'Home::penerimaan');

$routes->get('/admin/login', 'Admin::login');
$routes->post('/admin/loginProses', 'Admin::loginProses');
$routes->get('/admin/dashboard', 'Admin::dashboard');
$routes->get('/admin/logout', 'Admin::logout');

$routes->get('/admin/kegiatan', 'Admin::kegiatan');
$routes->post('/admin/kegiatan/tambah', 'Admin::tambahKegiatan');
$routes->post('/admin/kegiatan/edit/(:num)', 'Admin::editKegiatan/$1');
$routes->get('/admin/kegiatan/hapus/(:num)', 'Admin::hapusKegiatan/$1');

$routes->get('/admin/penerimaan', 'Admin::penerimaan');
$routes->post('/admin/penerimaan/tambah', 'Admin::tambahPenerimaan');
$routes->get('/admin/penerimaan/hapus/(:num)', 'Admin::hapusPenerimaan/$1');
$routes->post('/admin/penerimaan/edit/(:num)', 'Admin::editPenerimaan/$1');






