<?php
/**
 * Created by PhpStorm.
 * User: RPL
 * Date: 05/11/2016
 * Time: 9:31
 */

Router::resource('/admin/account', 'AkunController', 'login:1');

Router::get('/admin/profile', 'AkunController@profile', 'login:1');
Router::post('/admin/profile', 'AkunController@proses_profile', 'login:1');
Router::get('/admin/password', 'AkunController@password', 'login:1');
Router::post('/admin/password', 'AkunController@proses_password', 'login:1');


Router::get('/', 'SiteController@home');
Router::get('/filter', 'SiteController@filter');



Router::not_found();