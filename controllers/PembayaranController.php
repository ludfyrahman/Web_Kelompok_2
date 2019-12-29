<?php
include "SettingController.php";
App::loadModels(['Pemesanan', 'media']);
class pembayaranController {
    private $pembayaran, $pemesanan, $media, $setting;

    public function __construct() {
        $this->pembayaran = new pembayaran;
        $this->pemesanan = new pemesanan;
        $this->media = new media;
        $this->setting = new SettingController;
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
            $status = 1;
            if ($d['status'] == 1) {
                $status = 2;
            }else if($d['status'] == 2){
                $status = 3;
            }
            App::UploadImage($f['file'], 'bukti');
            $q = $this->pembayaran->Insert(['id_pemesanan' => $id,  'tipe' => $d['status'], 'jumlah' => $d['bayar'], 'bukti_bayar' => $f['file']['name']]);
            $this->pemesanan->update(['status' => $status], "WHERE id=$id");
            if(!$q){
                echo json_encode(['status' => true]);
            }else{
                echo json_encode(['status' => false]);
            }
        }
        catch(Exception $e) {

            echo $e->getMessage();
        }
    }
    public function aksi($type, $id){
        $d = $_POST;
        try {
            if ($type == 2) {
                // echo "<pre>";
                $r = $this->pembayaran->select("*", "p JOIN pemesanan pm ON p.id_pemesanan=pm.id JOIN kos k ON pm.id_kos=k.id WHERE p.id='$id'")[1][0];
                // print_r($r);
                $this->pembayaran->update(['jumlah_kamar' => $r['jumlah_kamar'] - 1], "WHERE id=$r[id]", "kos");
            }
            $arr = [
                'status' => 1, 
            ];
            $this->pembayaran->update($arr, "WHERE id=$id");
            // $r = $this->pemesanan->select("k.id, k.jumlah_kamar", "p JOIN pembayaran pp ON p.id=pp.id_pemesanan JOIN kos k ON p.id_kos=k.id", "WHERE pp.id=$id")[1][0];
            // $this->pemesanan->update(['jumlah_kamar' => $r['jumlah_kamar'] - 1], "WHERE id=$r[id]", "kos");
            Response::redirectWithAlert('admin/pembayaran/', ['info', 'Status Pembayaran dengan kode '.invoice_code."".$id." Sudah di update"]);
        }
        catch(Exception $e) {
            print_r($e->errorInfo[2]);
        }
    }
    public function bayar($id){
        $data = $this->pemesanan->detailPemesanan($id)[1][0];
        // echo "<pre>";
        // print_r($data);
        $media = $this->media->Select("*", "WHERE id_kos='$data[id_kos]' LIMIT 1")[1][0];
        Response::render('front/index', ['title' => "Pembayaran     ", 'data' => $data, 'content' => 'pembayaran/bayar', 'media' => $media]);
    }
    public function notifikasi(){
        $now = date('Y-m-d');
        $d = $this->pemesanan->select("p.id, id_kos, stnotif, id_pengguna, tanggal_pemesanan,p. status, (CASE WHEN p.status = 1 then DATE(tanggal_pemesanan) when p.status = 2 then DATE(tanggal_pemesanan)  when p.status = 3 then DATE(tanggal_pemesanan) end ) as tanggal_tempo, pg.email", "p JOIN pengguna pg ON p.id_pengguna=pg.id", "ORDER BY tanggal_pemesanan asc")[1];
        echo "<pre>";
        // print_r($d);
        foreach ($d as $key ) {
            if($key['status'] != 0){
                $notif = date('Y-m-d', strtotime($key['tanggal_tempo']. "-1 day"));
                if($now == $notif){
                    if($key['stnotif'] == 0){
                        echo "tanggal tempo ".$key['tanggal_tempo']." tanggal notifikasi nya ".$notif."<br>";
                        $this->setting->notifikasi_pembayaran("papikos@gmail.com", $key['email'], $key['id']);
                    }
                }
            }
        }
    }

}