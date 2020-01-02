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
    Router::post('/admin/kost/uploadFile/:id', 'KosController@storeFile');
    // end kos
    Router::resource('/admin/fasilitas', 'FasilitasController');
    Router::resource('/admin/sub_fasilitas', 'Sub_FasilitasController');
    // Router::resource('/admin/fasilitas/sub_fasilitas', 'SubFasilitasController');
    Router::resource('/admin/kategori', 'KategoriController');
    // Router::resource('/admin/kategori/sub_kategori', 'SubKategoriController');

    Router::get('/admin/dashboard', 'DashboardController@index');


    Router::resource('/admin/pemesanan', 'PemesananController', 'login:1');
    // Router::post('/admin/pemesanan', 'PemesananController@index', 'login:1');
    Router::get('/admin/pemesanan/pdf', 'PemesananController@pdf', 'login:1');
    Router::get('/admin/pemesanan/aksi/:status/:id', 'PemesananController@aksi', 'login:1');
    Router::resource('/admin/pembayaran', 'PembayaranController', 'login:1');
    Router::get('/admin/pembayaran/aksi/:type/:id', 'PembayaranController@aksi', 'login:1');
    Router::post('/admin/pembayaran', 'PembayaranController@index', 'login:1');
    // report
        Router::get('/admin/report', 'ReportController@index', 'login:1');
        Router::post('/admin/report', 'ReportController@index', 'login:1');
// end backend

// front end 
    Router::get('/', 'SiteController@home');
    Router::get('/filter', 'SiteController@filter');

    // pengguna
    Router::get('/pengguna/login', 'PenggunaController@login');
    Router::get('/pengguna/loginfb', 'PenggunaController@loginfb');
    Router::get('/pengguna/profil', 'PenggunaController@profil');
    Router::get('/pengguna/profil/pengaturan', 'PenggunaController@pengaturan');
    Router::get('/pengguna/wishlist', 'SiteController@wishlist');
    Router::post('/pengguna/wishlist', 'SiteController@wishlist');
    Router::get('/pengguna/gmail?:code', 'PenggunaController@gmail');
    Router::post('/pengguna/profil/proses_password', 'PenggunaController@proses_password');
    Router::get('/keluar', 'PenggunaController@logout');
    Router::get('/lupa_password', 'PenggunaController@lupa_password');
    Router::post('/lupa_password', 'PenggunaController@proses_forgot_password');
    Router::get('/ubah_password/:kode', 'PenggunaController@ubah_password');
    Router::post('/ubah_password/:kode', 'PenggunaController@proses_ubah_password');
    Router::post('/pengguna/proses_login', 'PenggunaController@proses_login');
    Router::post('/pengguna/proses_register', 'PenggunaController@proses_register');
        // verifikasi
        Router::get("/verifikasi_email/:from/:to", "SettingController@verification_code");
        Router::get("/verifikasi/:code", "SettingController@verifikasi");
        Router::post("/pengguna/proses_verifikasi/:tipe", "PenggunaController@proses_verifikasi");
        Router::get("/verifikasi_no_hp/:to", "SettingController@verification_code_hp");
        Router::post('/pengguna/simpanProfil', 'PenggunaController@simpanProfil');
        Router::post('/pengguna/simpanRekening', 'PenggunaController@simpanRekening');
        Router::post('/pengguna/uploadFotoProfil', 'PenggunaController@uploadFotoProfil');
    // end  pengguna

    
    // pemesanan
    Router::get('/kos/detail/:id', 'KosController@detail');
    Router::get('/kos/pesan/:id', 'KosController@pesan');
    Router::get('/kos/semua', 'KosController@semua');
    Router::post('/kos/semua', 'KosController@semua');
    // rating / review
        Router::post('/kos/ulasan', 'KosController@ulasan');
        Router::get('/ulasan/:id', 'KosController@reviewExist');
    // end rating
    Router::get('/kos/pesanAction/:id', 'PemesananController@doOrder');
    Router::get('/akun/pemesanan/detail/:id', 'PemesananController@detailPemesananUser');
    // notifikasi
        Router::get("/pembayaran/notifikasi", "PembayaranController@notifikasi");
    // favoritkan
        Router::get('/kos/favorit/:id', 'KosController@favorit');
        

    // authentication
    Router::get("/admin/setting", 'SettingController@index');
    // pembayaran
    Router::get('/pemesanan/bayar/:id/:status', 'PembayaranController@bayar');
    Router::post('/bayar/uploadBukti/:id', 'PembayaranController@doPay');
    // Router::get('/bayar/uploadBukti', 'PembayaranController@doPay');
    Router::get('/invoice/:id', 'PemesananController@invoice');
    // transaksi
    Router::get('/transaksi', 'PemesananController@transaction');
// end front end


Router::not_found();