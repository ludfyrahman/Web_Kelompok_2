<?php
require_once('../define.php');
$pdo = new PDO("mysql:hostname=".host.";dbname=".dbname."", ''.username.'', ''.password.'' , [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
?>