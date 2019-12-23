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
define('CLIENT_SECRET', '1A96xemFAeRUWNZXp-FAvkWV');
define('CLIENT_REDIRECT_URL', BASEURL.'helpers/gauth.php');

// api key sendgrid
define('SENDGRID_API_KEY', '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');

// nexmo
define('NEXMO_API_KEY', '68206d0a');
define('NEXMO_API_SECRET', 'H9nFINin9ytRgmeT');
// facebook developer
define('APP_FACEBOOK_ID', '2805059026218742');
define('APP_FACEBOOK_SECRET', '5149e105679e1a94af140166858a209a');


/* Google App Redirect Url */
define('host', 'localhost');
define('dbname', 'papikos');
define('username', 'root');
define('password', '051299');


// transaction and other
define('invoice_code', 'INV000');

define('jenis_kelamin', ['', 'Laki-laki', 'Perempuan']);
define('level', ['', 'Admin', 'Pemilik Kos', 'Penyewa Kos']);
define('tipe_pembayaran', ['', 'DP', 'Pelunasan', 'Bulanan']);
define('status', ['danger', 'default', 'primary', 'success']);

// status pemesanan
define('status_pemesanan', ['Ditolak', 'Pending','DP','Lunas']);