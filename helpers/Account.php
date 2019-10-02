<?php



App::LoadModels(['Akun']);
class Account {
    public static function Get($index) {
        $a = new Akun;
        $d = $a->Select($index, "WHERE id = $_SESSION[userid]");

        return $d[1][0][$index];
    }
}