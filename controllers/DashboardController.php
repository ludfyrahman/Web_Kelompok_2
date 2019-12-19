<?php 
    App::loadModels(['kategori', 'pengguna', 'pemesanan', 'pembayaran','kos']);
    class DashboardController{
        private $kategori, $pengguna, $pemesanan, $pembayaran, $kos;
        public function __construct(){
            $this->kategori = new Kategori;
            $this->pengguna = new Pengguna;
            $this->pemesanan = new Pemesanan;
            $this->pembayaran = new Pembayaran;
            $this->kos = new Kos;
        }
        public function index(){
            $kategori   = $this->kategori->Select("*", "");
            $pengguna   = $this->pengguna->Select("*", "");
            $pemesanan  = $this->pemesanan->Select("*", "");
            $pemesanan_lunas  = $this->pemesanan->Select("p.*, SUM(pp.jumlah) as jumlah, pg.nama, pg.no_hp", "p JOIN pembayaran pp on pp.id_pemesanan=p.id JOIN pengguna pg on p.id_pengguna=pg.id", "where p.status=3 and pp.status=1");
            $pemesanan_pembayaran_lunas  = $this->pemesanan->Select("SUM(pp.jumlah) as jumlah", "p JOIN pembayaran pp on pp.id_pemesanan=p.id where p.status=3 and pp.status=1");
            $pembayaran = $this->pembayaran->Select("*", "");
            $kos        = $this->kos->Select("*", "");
            $tahun = date('Y');
            $pemesanan_chart  = $this->pemesanan->Select("COUNT(*) as jumlah, DATE_FORMAT(tanggal_pemesanan, '%m') as tanggal", " WHERE YEAR(tanggal_pemesanan) = $tahun ", "GROUP BY tanggal")[1];
            // echo "<pre>";
            // print_r($pemesanan_pembayaran_lunas);
            $jumlah_pemesanan = [];
            $bulan_pemesanan = [];
            foreach ($pemesanan_chart as $p) {
                array_push($jumlah_pemesanan, $p['jumlah']);
                array_push($bulan_pemesanan, $p['tanggal']);
            }
            $jumlah_pemesanan  = json_encode($jumlah_pemesanan);
            $bulan_pemesanan  = json_encode($bulan_pemesanan);
            $presentase_pemesanan = ($pemesanan_lunas[0] * 100 / $pemesanan[0]);
            // print_r($presentase_pemesanan);
            // echo "<pre>";
            // print_r($jumlah_pemesanan);
            Response::render('back/index', 
            [
                'title' => 'Dashboard', 
                'content' => 'dashboard/index', 
                'kategori' => $kategori, 
                'pengguna' => $pengguna, 
                'pemesanan' => $pemesanan, 
                'pembayaran' => $pembayaran, 
                'kos' => $kos,
                'jumlah_pemesanan' => $jumlah_pemesanan,
                'pemesanan_lunas' => $pemesanan_pembayaran_lunas[1][0],
                'bulan_pemesanan' => $bulan_pemesanan,
                'data_pemesanan_lunas' => $pemesanan_lunas[1],
                'presentase_pemesanan' => number_format($presentase_pemesanan),
                ]
            );
        }
    }
?>