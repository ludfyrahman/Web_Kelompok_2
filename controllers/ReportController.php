<?php
App::loadModels(['pengguna']);
class ReportController {
    private $pengguna;
    public function __construct() {
        $this->pengguna = new Pengguna;
    }

    public function index() {
        $now = date("Y-m");
        $next_month = date('Y-m', strtotime($now. ' +1 month'));
        $d = $_POST;
        if(isset($d['cari'])){
            $now = $d['start_date'];
            $next_month = $d['end_date'];
        }
        $lists = $this->data($now, $next_month);
        Response::render('back/index', ['title' => 'Laporan', 'content' => 'report/index', 'list' => $lists]);
    }
    public function data($start_date = "2019-11",  $end_date = "2019-12"){
        $where = "";
        if (Account::get("level") != 1) {
            $where = " AND pg.id = ".Account::get('id');
        }
        $q = $this->pengguna->CustomSelect("SELECT tgl, IFNULL(ditolak, 0) ditolak, IFNULL(pending, 0) pending, IFNULL(dp, 0) dp, IFNULL(lunas, 0) lunas
        FROM (
        SELECT ADDDATE('2019-10-10',  t3.i * 1000 + t2.i * 100 + t1.i * 10 + t0.i) tgl FROM
        (SELECT 0 i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) t3,
        (SELECT 0 i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) t2,
        (SELECT 0 i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) t1,
        (SELECT 0 i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) t0
        ) z

        LEFT JOIN (SELECT DATE(tanggal_pemesanan) dt, COUNT(*) ditolak FROM pemesanan p JOIN kos k ON p.id_kos=k.id JOIN pengguna pg ON pg.id=k.ditambahkan_oleh WHERE p.status = 0 $where GROUP BY DATE(tanggal_pemesanan)) a ON a.dt = tgl
        LEFT JOIN (SELECT DATE(tanggal_pemesanan) dt, COUNT(*) pending FROM pemesanan p JOIN kos k ON p.id_kos=k.id JOIN pengguna pg ON pg.id=k.ditambahkan_oleh WHERE p.status = 1 $where GROUP BY DATE(tanggal_pemesanan)) b ON b.dt = tgl
        LEFT JOIN (SELECT DATE(tanggal_pemesanan) dt, COUNT(*) dp FROM pemesanan p JOIN kos k ON p.id_kos=k.id JOIN pengguna pg ON pg.id=k.ditambahkan_oleh WHERE p.status = 2 $where GROUP BY DATE(tanggal_pemesanan)) c ON c.dt = tgl
        LEFT JOIN (SELECT DATE(tanggal_pemesanan) dt, COUNT(*) lunas FROM pemesanan p JOIN kos k ON p.id_kos=k.id JOIN pengguna pg ON pg.id=k.ditambahkan_oleh WHERE p.status = 3 $where GROUP BY DATE(tanggal_pemesanan)) d ON d.dt = tgl

        LEFT JOIN (SELECT DATE(tanggal_pemesanan) dt, SUM(k.harga) harga FROM pemesanan p JOIN kos k ON p.id_kos = k.id GROUP BY DATE(tanggal_pemesanan)) f ON f.dt = tgl
        WHERE tgl BETWEEN '$start_date' and '$end_date'
        ORDER by tgl ASC
        ");
        return $q;
    }
}