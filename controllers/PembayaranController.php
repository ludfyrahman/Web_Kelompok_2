<?php
class pembayaranController {
    private $pembayaran;

    public function __construct() {
        $this->pembayaran = new pembayaran;
    }

    public function index() {
        $lists = $this->pembayaran->datapembayaran()[1];
        // print_r($lists);
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
    public function doOrder($id){
        $q = mysqli_query($host, "UPDATE kos set jumlah_kos=jumlah_kos-1 where id = $id");
        header('location:index.php');
    }

}