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