<?php 
    include "ReportController.php";

    App::loadModels(['kategori', 'pengguna', 'pemesanan', 'pembayaran','kos', 'fasilitas']);
    class DashboardController{
        private $kategori, $pengguna, $pemesanan, $pembayaran, $kos, $fasilitas, $report;
        public function __construct(){
            $this->kategori = new Kategori;
            $this->pengguna = new Pengguna;
            $this->pemesanan = new Pemesanan;
            $this->pembayaran = new Pembayaran;
            $this->fasilitas = new Fasilitas;
            $this->kos = new Kos;
            $this->report = new ReportController;
        }
        public function index(){
            $now = date("Y-m");
            $next_month = date('Y-m', strtotime($now. ' +1 month'));
            $data_pesanan = [0, 0, 0, 0];
            foreach ($this->report->data($now, $next_month) as $k) {
                $data_pesanan[0]+=$k['ditolak'];
                $data_pesanan[1]+=$k['pending'];
                $data_pesanan[2]+=$k['dp'];
                $data_pesanan[3]+=$k['lunas'];
            }
            $kategori   = $this->kategori->Select("*", "");
            $pengguna   = $this->pengguna->Select("*", "");
            $pemesanan  = $this->pemesanan->Select("*", "");
            $pesanan_bulan_ini  = $this->pemesanan->Select("*", "WHERE tanggal_pemesanan BETWEEN '$now-01' and '$next_month-01'");
            $fasilitas  = $this->fasilitas->Select("*", "");
            $pemesanan_lunas  = $this->pemesanan->Select("p.*, SUM(pp.jumlah) as jumlah, pg.nama, pg.no_hp", "p JOIN pembayaran pp on pp.id_pemesanan=p.id JOIN pengguna pg on p.id_pengguna=pg.id", "where p.status=3 and pp.status=1");
            $pemesanan_pembayaran_lunas  = $this->pemesanan->Select("SUM(pp.jumlah) as jumlah", "p JOIN pembayaran pp on pp.id_pemesanan=p.id where p.status=3 and pp.status=1");
            $pembayaran = $this->pembayaran->Select("*", "");
            $kos        = $this->kos->Select("*", "");
            $tahun = date('Y');
            $pemesanan_chart  = $this->pemesanan->Select("COUNT(*) as jumlah, DATE_FORMAT(tanggal_pemesanan, '%m') as tanggal", " WHERE YEAR(tanggal_pemesanan) = $tahun ", "GROUP BY tanggal")[1];
            $jumlah_pemesanan = [];
            $bulan_pemesanan = [];
            foreach ($pemesanan_chart as $p) {
                array_push($jumlah_pemesanan, $p['jumlah']);
                array_push($bulan_pemesanan, $p['tanggal']);
            }
            $jumlah_pemesanan  = json_encode($jumlah_pemesanan);
            $bulan_pemesanan  = json_encode($bulan_pemesanan);
            $presentase_pemesanan = ($pemesanan_lunas[0] * 100 / $pemesanan[0]);
            $label_pesanan = status_pemesanan;
            Response::render('back/index', 
            [
                'title' => 'Dashboard', 
                'content' => 'dashboard/index', 
                'kategori' => $kategori, 
                'pengguna' => $pengguna, 
                'pemesanan' => $pemesanan, 
                'pembayaran' => $pembayaran, 
                'fasilitas' => $fasilitas, 
                'label_pesanan' => json_encode($label_pesanan), 
                'data_pesanan' => json_encode($data_pesanan), 
                'kos' => $kos,
                'jumlah_pesanan_bulan' => $pesanan_bulan_ini[0],
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