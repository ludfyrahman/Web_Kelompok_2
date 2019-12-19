<?php
App::loadModels(["Media"]);
class PemesananController {
    private $pemesanan, $media;

    public function __construct() {
        $this->pemesanan = new pemesanan;
        $this->media = new Media;
    }

    public function index() {
        $lists = $this->pemesanan->dataPemesanan()[1];
        // print_r($lists);
        Response::render('back/index', ['title' => 'Daftar pemesanan', 'content' => 'pemesanan/index', 'list' => $lists]);

    }

    public function update($id) {
        $d = $_POST;

        try {
            $arr = [
                'nama' => $d['nama'], 
            ];


            $this->pemesanan->Update($arr, "WHERE id = $id");

            Response::redirectWithAlert('admin/pemesanan/', ['info', 'pemesanan berhasil diedit']);
        }
        catch(Exception $e) {

            $this->edit($id);
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