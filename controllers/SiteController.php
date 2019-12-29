<?php

App::loadModels(['Kos','kategori', 'pengguna', 'favorit']);
include "SettingController.php";
class SiteController {
    private $kos, $setting;
    public function __construct() {
        $this->kos = new Kos();
        $this->kategori = new Kategori();
        $this->pengguna = new Pengguna();
        $this->favorit = new Favorit();
        $this->setting = new SettingController();
    }

    public function home() {
        $kos = $this->kos->Select('k.nama, k.id, k.deskripsi, k.jumlah_kamar, k.harga, m.link_media, p.nama as nama_pemilik, k.tanggal_ditambahkan ', " k LEFT JOIN pengguna p on k.ditambahkan_oleh=p.id JOIN (Select * from media) m on k.id=m.id_kos GROUP BY m.id_kos ", "ORDER BY id DESC LIMIT 0, 3");
        $kategori = $this->kategori->Select('*', "ORDER BY id DESC");
        $pengguna = $this->pengguna->Select('*', "ORDER BY id DESC");
        $jumlahkos = $this->kos->Select('*', "ORDER BY id DESC");
        Response::render('front/index', ['title' => 'Papikos Homepage', 'content' => 'site/home', 'kos' => $kos[1], 'jumlahkos' => $jumlahkos[0], 'jumlahpengguna' => $pengguna[0], 'jumlahkategori' => $kategori[0]]);
    }

    public function filter() {
        echo "filter";
        $this->setting->send("rezamufti24@gmail.com", "ludfyr@gmail.com", 'Verifikasi Akun Papikos', 'berhsail<a href="youtube.com">test</a>');
    }

    public function wishlist(){
        $d = $_POST;
        $where = " where p.id= ".Account::Get('id');
        if(isset($d['search'])){
            $cari = $_POST['cari'];
            $where.=" and k.nama like '%$cari%' ";
        }
        // print_r($where);
        $favorit = $this->favorit->Select('k.nama, k.id, k.deskripsi, k.jumlah_kamar, k.harga, m.link_media, k.tanggal_ditambahkan ', " f JOIN kos k ON f.id_kos=k.id JOIN pengguna p on f.id_pengguna=p.id  JOIN (Select * from media) m on k.id=m.id_kos $where ", "GROUP BY m.id_kos");
        Response::render('front/index', ['title' => 'Profil '.Account::Get('nama'), 'content' => 'user/wishlist', 'data' => $favorit[1]]);
    }
    
}