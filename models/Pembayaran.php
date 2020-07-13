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
            if ($date[2] != "") {
                echo "status ".$date[2];
                $range.=" AND p.tipe=$date[2] ";
            }
        }
        if(Account::get('level') == 2){
            $range.=" AND k.ditambahkan_oleh=".Account::get('id');
        }
        $q = $this->Select("p.id,pg.nama as nama_pemesan, p.tipe, p.jumlah, p.bukti_bayar, p.tanggal_pembayaran, p.id_pemesanan ", 
        " p JOIN pemesanan pm ON p.id_pemesanan=pm.id JOIN pengguna pg ON pm.id_pengguna=pg.id JOIN kos k ON pm.id_kos=k.id", 
        " $range ");
        return $q;
    }

}