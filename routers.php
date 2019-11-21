<?php
/**
 * Created by PhpStorm.
 * User: RPL
 * Date: 05/11/2016
 * Time: 9:31
 */
// backend
    Router::resource('/admin/pengguna', 'PenggunaController');
    // kos
    Router::resource('/admin/kost', 'KosController');
    Router::post('/admin/kos/uploadFile/:id', 'KosController@storeFile');
    // end kos
    Router::resource('/admin/fasilitas', 'FasilitasController');
    Router::resource('/admin/fasilitas/sub_fasilitas', 'SubFasilitasController');
    Router::resource('/admin/kategori', 'KategoriController');
    Router::resource('/admin/kategori/sub_kategori', 'SubKategoriController');

    Router::get('/admin/dashboard', 'DashboardController@index');
    Router::get('/admin/profile', 'AkunController@profile', 'login:1');
    Router::post('/admin/profile', 'AkunController@proses_profile', 'login:1');
    Router::get('/admin/password', 'AkunController@password', 'login:1');
    Router::post('/admin/password', 'AkunController@proses_password', 'login:1');
// end backend

// front end 
    Router::get('/', 'SiteController@home');
    Router::get('/filter', 'SiteController@filter');
    Router::get('/pengguna/login', 'PenggunaController@login');
    Router::get('/pengguna/profil', 'PenggunaController@profil');
    Router::get('/pengguna/gmail', 'PenggunaController@gmail');
    Router::get('/pengguna/lupaPasssword', 'PenggunaController@password');
    Router::get('/pengguna/keluar', 'PenggunaController@logout');
    Router::post('/pengguna/proses_login', 'PenggunaController@proses_login');
// end front end



Router::not_found();