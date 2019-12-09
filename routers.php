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


    Router::resource('/admin/pemesanan', 'PemesananController', 'login:1');
    Router::resource('/admin/pembayaran', 'PembayaranController', 'login:1');
// end backend

// front end 
    Router::get('/', 'SiteController@home');
    Router::get('/filter', 'SiteController@filter');
    Router::get('/pengguna/login', 'PenggunaController@login');
    Router::get('/pengguna/profil', 'PenggunaController@profil');
    Router::get('/pengguna/gmail?:code', 'PenggunaController@gmail');
    Router::get('/pengguna/lupaPasssword', 'PenggunaController@password');
    Router::get('/keluar', 'PenggunaController@logout');
    Router::post('/pengguna/proses_login', 'PenggunaController@proses_login');

    Router::get('/kos/detail/:id', 'KosController@detail');
    
    // pemesanan
    Router::get('/kos/pesan/:id', 'KosController@pesan');
    Router::get('/kos/semua', 'KosController@semua');
    Router::post('/kos/semua', 'KosController@semua');
    Router::get('/kos/pesanAction/:id', 'PemesananController@doOrder');
    Router::get('/akun/pemesanan/detail/:id', 'PemesananController@detailPemesananUser');

    // pembayaran
    Router::get('/pemesanan/bayar/:id', 'PembayaranController@bayar');
    Router::post('/bayar/uploadBukti/:id', 'PembayaranController@doPay');
    Router::get('/invoice/:id', 'PemesananController@invoice');

    // transaksi
    Router::get('/transaksi', 'PemesananController@transaction');
// end front end



Router::not_found();