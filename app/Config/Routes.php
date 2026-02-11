<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// --- 1. ROUTES AUTH (LOGIN & REGISTER) ---
// Halaman awal ('/') langsung diarahkan ke Login
$routes->get('/', 'Auth::index'); 
$routes->get('login', 'Auth::index');
$routes->post('login/process', 'Auth::loginProcess');

$routes->get('register', 'Auth::register');
$routes->post('register/process', 'Auth::registerProcess');

$routes->get('logout', 'Auth::logout');


// --- 2. ROUTES LATIHAN (PUBLIC) ---
// Bagian ini dibiarkan terbuka (tanpa login) untuk keperluan belajar/testing
$routes->get('/latihan', 'Latihan::index');
$routes->get('/latihan/codeigniter', 'Latihan::codeigniter');
$routes->get('/latihan/menampilkan_view', 'Latihan::menampilkan_view');
$routes->get('/latihan/tampil_view', 'Latihan::tampil_view');


// --- 3. ROUTES TERPROTEKSI (HARUS LOGIN) ---
// Semua route di dalam group ini akan dicek oleh 'AuthFilter'
$routes->group('', ['filter' => 'auth'], function($routes) {
    
    // Module Dashboard
    $routes->get('dashboard', 'Dashboard::index');

    // Module Biodata (Profil User)
    $routes->get('biodata', 'Biodata::index');
    // Tambahan Route untuk Simpan Profil & Ganti Password:
    $routes->post('biodata/update_profile', 'Biodata::update_profile');
    $routes->post('biodata/update_password', 'Biodata::update_password');

    // Module Mahasiswa
    $routes->get('mahasiswa', 'Mahasiswa::index');
    $routes->get('mahasiswa/tambah', 'Mahasiswa::tambah');
    $routes->post('mahasiswa/simpan', 'Mahasiswa::simpan');
    $routes->get('mahasiswa/edit/(:num)', 'Mahasiswa::edit/$1');
    $routes->post('mahasiswa/update', 'Mahasiswa::update');
    $routes->get('mahasiswa/delete/(:num)', 'Mahasiswa::delete/$1');

    // Module Mata Kuliah
    $routes->get('matakuliah', 'Matakuliah::index');
    $routes->get('matakuliah/tambah', 'Matakuliah::tambah');
    $routes->post('matakuliah/simpan', 'Matakuliah::simpan');
    $routes->get('matakuliah/edit/(:num)', 'Matakuliah::edit/$1');
    $routes->post('matakuliah/update', 'Matakuliah::update');
    $routes->get('matakuliah/delete/(:num)', 'Matakuliah::delete/$1');

    // Module Kalender Akademik
    $routes->get('kalender', 'Kalender::index');

});