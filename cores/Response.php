<?php

class Response {
    public static function render($file, $var = []) {
        extract($var);
        include BASEPATH . "views/$file.php";
    }

    public static function part($file, $var = []) {
        Response::render("partials/$file", $var);
    }

    public static function backPart($file, $var = []) {
        Response::render("back/content/$file", $var);
    }

    public static function redirect($url) {
        echo "<script>window.location='".BASEURL."$url'</script>";
        exit();
    }

    public static function redirectWithAlert($url, $alert) {
        $_SESSION['alert'] = $alert;
        Response::redirect($url);
    }
}