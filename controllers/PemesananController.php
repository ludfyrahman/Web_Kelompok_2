<?php
App::loadModels(["Media"]);
use Dompdf\Dompdf;
class PemesananController {
    private $pemesanan, $media;
    public function __construct() {
        $this->pemesanan = new pemesanan;
        $this->media = new Media;
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
            // if ($status = ) {
            //     # code...
            // }
            $arr = [
                'nama' => $d['nama'], 
                'tanggal_ditambahkan' => date("Y-m-d H:i:s"),
                'ditambahkan_oleh' => Account::Get('id')
            ];

            // $this->kategori->Insert($arr);

            // Response::redirectWithAlert('admin/kategori/', ['info', 'kategori berhasil ditambahkan']);
        }
        catch(Exception $e) {
            // if($e->errorInfo[2] == "Duplicate entry '$d[email]' for key 'email'")
            //     $_SESSION['alert'] = ['danger', 'Email sudah terpakai'];
            print_r($e->errorInfo[2]);
            // $this->add();
        }
    }
    public function doOrder($id){
        $arr = [
            'id_kos' => $id,
            'id_pengguna' => Account::Get("id"),
        ];
        $this->pemesanan->insert($arr);
        $id = $this->pemesanan->lastInsertId();
        Response::redirectWithAlert('akun/pemesanan/detail/'.$id, ['info', 'pemesanan berhasil diedit']);
    }
    public function detailPemesananUser($id){
        $data = $this->pemesanan->detailPemesanan($id)[1][0];
        // print_r($data);
        $media = $this->media->Select("*", "WHERE id_kos='$data[id_kos]' LIMIT 1")[1][0];
        // echo "<pre>";
        // print_r($media);
        Response::render('front/index', ['title' => 'Detail pemesanan', 'content' => 'pemesanan/detail', 'data' => $data, 'media' => $media]);
    }
    public function invoice($id){
        $data = $this->pemesanan->detailPemesanan($id)[1][0];
        Response::render('partials/invoice', ['title' => "invoice", 'data' => $data]);
    }
    public function transaction(){
        $id = Account::Get('id');
        $dp = $this->pemesanan->Select("p.id as id_pemesanan, p.*, k.*", " p JOIN kos k on p.id_kos=k.id ", " WHERE id_pengguna='$id' and status='1'")[1];
        $dibatalkan = $this->pemesanan->Select("p.id as id_pemesanan, p.*, k.*", " p JOIN kos k on p.id_kos=k.id ", " WHERE id_pengguna='$id' and status='0'")[1];
        $lunas = $this->pemesanan->Select("p.id as id_pemesanan, p.*, k.*", " p JOIN kos k on p.id_kos=k.id ", " WHERE id_pengguna='$id' and status='2'")[1];
        $selesai = $this->pemesanan->Select("p.id as id_pemesanan, p.*, k.*", " p JOIN kos k on p.id_kos=k.id ", " WHERE id_pengguna='$id' and status='3'")[1];
        // echo "<pre>";
        // print_r($dp);
        Response::render('front/index', ['title' => 'Daftar Transaksi', 'content' => 'pemesanan/index', 'dp' => $dp, 'lunas' => $lunas, 'dibatalkan' => $dibatalkan, 'selesai' => $selesai]);
    }

}