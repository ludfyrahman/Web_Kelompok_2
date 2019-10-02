<?php

class Input {
    public static function postOrOr($index, $a = '', $b ='') {
        if(isset($_POST[$index]) && $_POST[$index] != '')
            return $_POST[$index];
        else if(isset($a))
            return $a;
        return $b;
    }

    public static function getOr($index, $a = '') {
        if(isset($_GET[$index]) && $_GET[$index] != '')
            return $_GET[$index];
        return $a;
    }
}