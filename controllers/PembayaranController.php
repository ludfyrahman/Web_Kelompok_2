<?php
App::loadModels(['Pemesanan', 'media']);
class pembayaranController {
    private $pembayaran, $pemesanan, $media;

    public function __construct() {
        $this->pembayaran = new pembayaran;
        $this->pemesanan = new pemesanan;
        $this->media = new media;
    }

    public function index() {
        // $lists = $this->pembayaran->datapembayaran()[1];
        $d = $_POST;
        if (isset($d['cari'])) {
            $start_date = date("Y-m-d", strtotime($d['start_date']));
            // echo "berhasil";
            $end_date = date("Y-m-d", strtotime($d['end_date']));
            $send = [
                $start_date, $end_date
            ];
            $lists = $this->pembayaran->datapembayaran($send)[1];
        }else{
            $lists = $this->pembayaran->datapembayaran()[1];
        }
        Response::render('back/index', ['title' => 'Daftar pembayaran', 'content' => 'pembayaran/index', 'list' => $lists]);

    }

    public function update($id) {
        $d = $_POST;

        try {
            $arr = [
                'nama' => $d['nama'], 
            ];


            $this->pembayaran->Update($arr, "WHERE id = $id");

            Response::redirectWithAlert('admin/pembayaran/', ['info', 'pembayaran berhasil diedit']);
        }
        catch(Exception $e) {

            $this->edit($id);
        }
    }
    public function doPay($id){
        $d = $_POST;
        $f = $_FILES;
        try {
            App::UploadImage($f['file'], 'bukti');
            $q = $this->pembayaran->Insert(['id_pemesanan' => $id,  'tipe' => 1, 'jumlah' => $d['dp'], 'bukti_bayar' => $f['file']['name']]);
            if($q){
                return true;
            }else{
                return false;
            }
            Response::redirectWithAlert('admin/pembayaran/', ['info', 'pembayaran berhasil diedit']);
        }
        catch(Exception $e) {

            echo $e->getMessage();
        }
    }
    public function bayar($id){
        $data = $this->pemesanan->detailPemesanan($id)[1][0];
        // echo "<pre>";
        // print_r($data);
        $media = $this->media->Select("*", "WHERE id_kos='$data[id_kos]' LIMIT 1")[1][0];
        Response::render('front/index', ['title' => "Pembayaran     ", 'data' => $data, 'content' => 'pembayaran/bayar', 'media' => $media]);
    }

}