<?php
/**
 * Created by PhpStorm.
 * User: RPL
 * Date: 05/11/2016
 * Time: 9:30
 */

session_start();
date_default_timezone_set('Asia/Jakarta');

define('BASEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/' . basename(__DIR__) . '/');
define('BASEASSET', BASEURL . 'assets/');
define('BASEADM', BASEURL . 'admin/');
define('BASEPATH', str_replace('\\', '/', dirname(__FILE__)) . '/');


// configure google api setting
/* Google App Client Id */
define('CLIENT_ID', '381036941652-c840m0csbpp1fb22108i1vkeeg4t9r6i.apps.googleusercontent.com');

/* Google App Client Secret */
define('CLIENT_SECRET', 'wALbRhhB4vWGoXDsoI7JcRAh');

/* Google App Redirect Url */
define('CLIENT_REDIRECT_URL', 'http://localhost/papikos/pengguna/gmail');