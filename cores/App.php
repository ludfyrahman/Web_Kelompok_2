<?php

class App {
    public static function LoadModels($arr) {
        foreach($arr as $a)
            if(!class_exists($a))
                include BASEPATH . "models/$a.php";
    }
    public static function validateTypeUpload($array, $file){
            
        if(in_array($file['type'], $array)){
            return true;
        }else{
            return false;
        }
    }
    public static function validateSizeUpload($limit, $file){
        // 39092  = 39 kb
        if($file['size'] > $limit){
            return false;
        }else{
            return true;
        }
    }
    public static function UploadImage($img, $path) {
        $path = "assets/images/upload/$path/$img[name]";
        move_uploaded_file($img['tmp_name'], BASEPATH . $path);
        chmod($path, 0755);
    }
    public static function UploadMultiImage($img, $path, $index) {
        $images = $img['name'][$index];
        $path = "assets/images/upload/$path/$images";
        move_uploaded_file($img['tmp_name'][$index], BASEPATH . $path);
        chmod($path, 0755);
    }
    public static function uri($index){
        $var = explode('/', "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
        return $var[$index];
    }
    
    public static function url(){
        $var = explode('/', "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
        return $var;
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
    public static function breadcrumb(){
        Response::part('breadcrumb');
    }
}