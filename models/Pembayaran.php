<?php

/**
 * Created by PhpStorm.
 * User: RPL
 * Date: 05/11/2016
 * Time: 10:02
 */
class Pembayaran extends ORM {
    public function dataPembayaran(){
        $q = $this->Select("p.id, k.nama as nama_kos, k.harga, pg.nama as nama_pemesan,p.tanggal_pemesanan, (CASE WHEN p.status = 0 THEN 'Ditolak' WHEN p.status = 1 THEN 'Pending' WHEN p.status = 2 THEN 'Dp' WHEN p.status = 3 THEN 'Lunas' END) as status ", " p JOIN kos k on p.id_kos=k.id JOIN pengguna pg on p.id_pengguna=pg.id");
        return $q;
    }

}