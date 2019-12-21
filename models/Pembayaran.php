<?php

/**
 * Created by PhpStorm.
 * User: RPL
 * Date: 05/11/2016
 * Time: 10:02
 */
class Pembayaran extends ORM {
    public function dataPembayaran($date = []){
        $range = "";
        if (count($date) > 0) {
            $range = "WHERE p.tanggal_pembayaran BETWEEN '$date[0]' and '$date[1]'";
        }
        $q = $this->Select("p.id,pg.nama as nama_pemesan, p.tipe, p.jumlah, p.bukti_bayar, p.tanggal_pembayaran ", " p JOIN pemesanan pm ON p.id_pemesanan=pm.id JOIN pengguna pg ON pm.id_pengguna=pg.id", " $range ");
        return $q;
    }

}