<?php

class App {
    public static function LoadModels($arr) {
        foreach($arr as $a)
            if(!class_exists($a))
                include BASEPATH . "models/$a.php";
    }

    public static function UploadImage($img, $path) {
        move_uploaded_file($img['tmp_name'], BASEPATH . "assets/$path/$img[name]");
    }

    public static function RandomString($length) {
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $char = '';

        for($i = 0; $i < $length; $i++) {
            $char .= $chars[rand(0, strlen($chars) - 1)];
        }

        return $char;
    }

    public static function Date($date, $type = 'd / M / Y H:i:s') {
        $d = date_create($date);
        return date_format($d, $type);
    }

    public static function price($harga) {
        return "Rp. " . number_format($harga, 0, '', '.');
    }
}