<?php
// error_reporting(0);
require 'define.php';
require 'cores/ORM.php';
require 'cores/Response.php';
require 'cores/Router.php';
require 'cores/Input.php';
require 'cores/App.php';
require 'cores/Paging.php';
require 'helpers/Account.php';
require 'vendor/autoload.php';
require 'helpers/google-login-api.php';
// require 'helpers/facebook/fb-callback.php';
require 'helpers/NexMo/NexmoMessage.php';
require 'helpers/PHPMAILER/PHPMailerAutoload.php';
require_once("helpers/dompdf/autoload.inc.php");
require 'routers.php';
// chmod($target_path, 0755);