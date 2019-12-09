<?php

/**
 * Created by PhpStorm.
 * User: RPL
 * Date: 05/11/2016
 * Time: 10:02
 */
class Pemesanan extends ORM {
    public function dataPemesanan(){
        $q = $this->Select("p.id, k.nama as nama_kos, k.harga, pg.nama as nama_pemesan,p.tanggal_pemesanan, (CASE WHEN p.status = 0 THEN 'Ditolak' WHEN p.status = 1 THEN 'Pending' WHEN p.status = 2 THEN 'Dp' WHEN p.status = 3 THEN 'Lunas' END) as status ", " p JOIN kos k on p.id_kos=k.id JOIN pengguna pg on p.id_pengguna=pg.id");
        return $q;
    }
    public function detailPemesanan($id){
        $q = $this->Select("p.id,k.id as id_kos, p.status as status_code, k.nama as nama_kos, k.jumlah_kamar, k.harga, pg.nama as nama, k.tanggal_diubah, pg.alamat, pg.no_hp, p.tanggal_pemesanan, pgg.nama as nama_pemilik, (CASE WHEN p.status = 0 THEN 'Ditolak' WHEN p.status = 1 THEN 'Pending' WHEN p.status = 2 THEN 'Dp' WHEN p.status = 3 THEN 'Lunas' END) as status ", " p JOIN kos k ON p.id_kos=k.id JOIN pengguna pg on p.id_pengguna=pg.id JOIN pengguna pgg on k.ditambahkan_oleh=pgg.id", "WHERE p.id='$id'");
        return $q;
    }
}