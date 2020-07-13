<?php
App::loadModels(["media", 'pembayaran']);
use Dompdf\Dompdf;
class PemesananController {
    private $pemesanan, $media;
    public function __construct() {
        $this->pemesanan = new pemesanan;
        $this->media = new Media;
        $this->pembayaran = new pembayaran;
    }

    public function index() {
        $start_date = Input::getOr('start_date');
        if ($start_date != "") {
            $start_date = date("Y-m-d", strtotime(Input::getOr('start_date')));
            $end_date = date("Y-m-d", strtotime(Input::getOr('end_date')));
            $st = Input::getOr('status');
            $send = [
                $start_date, $end_date, $st
            ];
            $lists = $this->pemesanan->dataPemesanan($send)[1];
        }else{
            $lists = $this->pemesanan->dataPemesanan()[1];
        }
        // echo "<pre>";
        // print_r($lists);
        Response::render ('back/index', ['title' => 'Daftar pemesanan', 'content' => 'pemesanan/index', 'list' => $lists]);

    }
    public function pdf(){
        // Response::render('partials/pdfPemesanan');
        $dompdf = new Dompdf();
        $html   = Response::render('partials/pdfPemesanan');
        $dompdf = new DOMPDF();
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream('laporan_'.$nama.'.pdf');
    }
    public function excel(){
        
    }
    public function aksi($status, $id){
        $d = $_POST;

        try {
            $arr = [
                'status' => $status, 
            ];

            $this->pembayaran->update($arr, "WHERE id=$id");
            // echo "berhasil";
            Response::redirectWithAlert('admin/pembayaran/', ['info', 'Status Pembayaran dengan kode '.invoice_code."".$id]);
        }
        catch(Exception $e) {
            print_r($e->errorInfo[2]);
        }
    }
    public function doOrder($id, $id_detail = null){
        $arr = [
            'id_kos' => $id_detail,
            'id_pengguna' => Account::Get("id"),
        ];
        $this->pemesanan->insert($arr);
        $id = $this->pemesanan->lastInsertId();
        Response::redirectWithAlert('akun/pemesanan/detail/'.$id, ['info', 'pemesanan berhasil diedit']);
    }
    public function detailPemesananUser($id){
        $data = $this->pemesanan->detailPemesanan($id)[1][0];
        // print_r($data);
        $media = $this->media->Select("*", "WHERE id_kos='$data[id_detail]' LIMIT 1")[1][0];
        // echo "<pre>";
        // print_r($data);
        Response::render('front/index', ['title' => 'Detail pemesanan', 'content' => 'pemesanan/detail', 'data' => $data, 'media' => $media]);
    }
    public function invoice($id){
        $data = $this->pemesanan->detailPemesanan($id)[1][0];
        Response::render('partials/invoice', ['title' => "invoice", 'data' => $data]);
    }
    public function transaction(){
        $id = Account::Get('id');
        $dp = $this->pemesanan->Select("p.id as id_pemesanan, p.*, k.*, dk.*", " p  JOIN (Select * from detail_kos) dk on dk.id=p.id_kos JOIN kos k on dk.id_kos=k.id", " WHERE id_pengguna='$id' and status='1' GROUP BY dk.id_kos")[1];
        $dibatalkan = $this->pemesanan->Select("p.id as id_pemesanan, p.*, k.*, dk.*", " p  JOIN (Select * from detail_kos) dk on dk.id=p.id_kos JOIN kos k on dk.id_kos=k.id", " WHERE id_pengguna='$id' and status='0' GROUP BY dk.id_kos")[1];
        $lunas = $this->pemesanan->Select("p.id as id_pemesanan, p.*, k.*, dk.*", " p  JOIN (Select * from detail_kos) dk on dk.id=p.id_kos JOIN kos k on dk.id_kos=k.id", " WHERE id_pengguna='$id' and status='2' GROUP BY dk.id_kos")[1];
        $selesai = $this->pemesanan->Select("p.id as id_pemesanan, p.*, k.*, dk.*", " p  JOIN (Select * from detail_kos) dk on dk.id=p.id_kos JOIN kos k on dk.id_kos=k.id", " WHERE id_pengguna='$id' and status='3' GROUP BY dk.id_kos")[1];
        // echo "<pre>";
        $now = date('Y-m-d');
        foreach ($dp as $d) {
            if (strtotime($now) > strtotime($d['tanggal_pemesanan']. ' +1 day')) {
                $this->pemesanan->update(['status' => 0], "WHERE id='$d[id_pemesanan]'");
            }
        }
        foreach ($lunas as $l) {
            // print_r($l);
            if (strtotime($now) > strtotime($l['tanggal_pemesanan']. ' +4 day')) {
                $this->pemesanan->update(['status' => 0], "WHERE id='$l[id_pemesanan]'");
            }
        }
        echo "<pre>";
        print_r($dibatalkan);
        // Response::render('front/index', ['title' => 'Daftar Transaksi', 'content' => 'pemesanan/index', 'dp' => $dp, 'lunas' => $lunas, 'dibatalkan' => $dibatalkan, 'selesai' => $selesai]);
    }
    public function detail($id){
        $data = $this->pemesanan->detailPemesanan($id)[1][0];
        // echo "<pre>";
        // print_r($data);
        $pembayaran = $this->pembayaran->select("*", "WHERE id_pemesanan=$data[id]")[1];
        // print_r($pembayaran); 

        Response::render ('back/index', ['title' => 'Detail pemesanan', 'content' => 'pemesanan/detail', 'data' => $data, 'pembayaran' => $pembayaran]);
    }
}