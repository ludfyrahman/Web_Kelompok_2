<?php

App::loadModels(['Kos','kategori', 'pengguna']);
class SiteController {
    private $kos;
    public function __construct() {
        $this->kos = new Kos();
        $this->kategori = new Kategori();
        $this->pengguna = new Pengguna();
    }

    public function home() {
        $kos = $this->kos->Select('k.nama, k.id, k.deskripsi, k.tanggal_ditambahkan, p.nama as nama_pemilik, k.harga, m.link_media', " k LEFT JOIN pengguna p on k.ditambahkan_oleh=p.id LEFT JOIN (SELECT link_media, id, id_kos FROM media LIMIT 1) m on k.id=m.id_kos ", "ORDER BY id DESC LIMIT 0, 3");
        $kategori = $this->kategori->Select('*', "ORDER BY id DESC");
        $pengguna = $this->pengguna->Select('*', "ORDER BY id DESC");
        // echo "<pre>";
        // print_r($kos);
        Response::render('front/index', ['title' => 'Papikos Homepage', 'content' => 'site/home', 'kos' => $kos[1], 'jumlahkos' => $kos[0], 'jumlahpengguna' => $pengguna[0], 'jumlahkategori' => $kategori[0]]);
    }

    public function filter() {
        echo "filter";
    }

    public function sitemap() {
        header("Content-Type: application/xml");

        echo "<?xml version='1.0' encoding='UTF-8' ?>";
        echo "<urlset xmns='http://sitemaps.org/schemas/sitemap/0.9'>";
        $this->createLink(BASEURL);

        $pariwisata = $this->pariwisata->Select("title, cover, permalink, text, name, 'pariwisata' type", "p JOIN kabupaten k ON p.kabupaten_id = k.id", "ORDER BY p.id DESC")[1];
        $restoran = $this->restoran->Select("title, cover, permalink, text, name, 'restaurant' type", "p JOIN kabupaten k ON p.kabupaten_id = k.id", "ORDER BY p.id DESC")[1];
        $hotel = $this->hotel->Select("title, cover, permalink, text, name, 'hotel' type", "p JOIN kabupaten k ON p.kabupaten_id = k.id", "ORDER BY p.id DESC")[1];
        $event = $this->event->Select("'event' type, permalink", "", "ORDER BY id DESC LIMIT 0, 4")[1];
        
        foreach(array_merge($pariwisata, $restoran, $hotel, $event) as $c)
            $this->createLink(BASEURL . "$c[type]/$c[permalink]/");
        
        echo "</urlset>";
    }

    public function createLink($link) {
        echo "<url>";
        echo "<loc>$link</loc>";
        echo "<priority>0.5</priority>";
        echo "</url>";
    }
}