<?php



App::LoadModels(['Pengguna']);
class Account {
    public static function Get($index) {
        $a = new Pengguna;
        $d = $a->Select($index, "WHERE id = $_SESSION[userid]");

        return $d[1][0][$index];
    }
}