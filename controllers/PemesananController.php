<?php
class PemesananController {
    private $pemesanan;

    public function __construct() {
        $this->pemesanan = new pemesanan;
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
        $q = mysqli_query($host, "UPDATE kos set jumlah_kos=jumlah_kos-1 where id = $id");
        header('location:index.php');
    }

}