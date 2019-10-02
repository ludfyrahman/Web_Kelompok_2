<?php



App::LoadModels(['Transaksi']);
class Transaction {
    public static function getOrderTotal() {
        $a = new Transaksi;
        $b = $a->Select('COUNT(*) total', "WHERE status = 1")[1][0];

        return $b['total'];
    }
}