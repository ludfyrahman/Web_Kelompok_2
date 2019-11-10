<?php
/**
 * Created by PhpStorm.
 * User: RPL
 * Date: 05/11/2016
 * Time: 9:31
 */

Router::resource('/admin/pengguna', 'PenggunaController');
Router::resource('/admin/kos', 'KosController');
Router::resource('/admin/fasilitas', 'FasilitasController');
Router::resource('/admin/fasilitas/sub_fasilitas', 'SubFasilitasController');
Router::resource('/admin/kategori', 'KategoriController');
Router::resource('/admin/kategori/sub_kategori', 'SubKategoriController');

Router::get('/admin/dashboard', 'DashboardController@index');
Router::get('/admin/profile', 'AkunController@profile', 'login:1');
Router::post('/admin/profile', 'AkunController@proses_profile', 'login:1');
Router::get('/admin/password', 'AkunController@password', 'login:1');
Router::post('/admin/password', 'AkunController@proses_password', 'login:1');


Router::get('/', 'SiteController@home');
Router::get('/filter', 'SiteController@filter');



Router::not_found();