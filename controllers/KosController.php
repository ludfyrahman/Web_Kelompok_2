<?php

App::loadModels(['kategori', 'media']);
class KosController {
    private $kos, $kategori, $media;

    public function __construct() {
        $this->kos = new Kos;
        $this->kategori = new Kategori;
        $this->media = new Media;
        // echo App::uri(4);
    }

    public function index() {
        $lists = $this->kos->customSelect("SELECT k.id, k.nama,k.harga, ka.nama as nama_kategori from kos k JOIN kategori ka ON k.id_kategori=ka.id");
        Response::render('back/index', ['title' => 'Daftar Akun', 'content' => 'kos/index', 'list' => $lists]);

    }

    public function add() {
        $kategori = $this->kategori->Select("*", "", "ORDER by id asc");
        Response::render('back/index', ['title' => 'Tambah Kos', 'content' => 'kos/_form', 'type' => 'Tambah', 'data' => null, 'kategori' => $kategori[1]]);
    }

    public function edit($id) {
        $data = $this->kos->Select("*", "WHERE id = $id")[1];
        $kategori = $this->kategori->Select("*", "", "ORDER by id asc");
        if(count($data) < 1)
            Router::not_found();
        Response::render('back/index', ['title' => 'Edit Kos', 'content' => 'kos/_form', 'type' => 'Edit', 'data' => $data[0], 'kategori' => $kategori[1]]);
    }

    public function storeFile($id){
        $f = $_FILES;
        foreach ($f["file"] as $key => $arrDetail) 
        {
            foreach ($arrDetail as $index => $detail) {
                $targetDir = BASEPATH."assets/images/upload/kos/";
                $type = explode('/', $f['file']['type'][$index]);
                $fileName = date('y-m-d').".".$type[1];
                $targetFile = $targetDir.$fileName;

                if(move_uploaded_file($_FILES["file"]['tmp_name'][$index],$targetFile))
                {
                    $this->media->insert(['link_media' => $fileName, 'id_kos' => $id]);
                    return "file uploaded"; 
                }else{
                    return "File not uploaded.";
                }
            }
        }
    }

    public function store() {
        $d = $_POST;

        try {
            $arr = [
                'nama' => $d['nama'], 
                'deskripsi' => $d['deskripsi'], 
                'harga' => $d['harga'],
                'id_kategori' => $d['kategori'],
                'tanggal_ditambahkan' => date("Y-m-d H:i:s"),
                'ditambahkan_oleh' =>  Account::Get('id')
            ];

            $this->kos->Insert($arr);

            Response::redirectWithAlert('admin/kos/', ['info', 'Kos berhasil ditambahkan']);
        }
        catch(Exception $e) {
            // if($e->errorInfo[2] == "Duplicate entry '$d[email]' for key 'email'")
            //     $_SESSION['alert'] = ['danger', 'Email sudah terpakai'];
            print_r($e->errorInfo[2]);
            // $this->add();
        }
    }

    public function update($id) {
        $d = $_POST;

        try {
            $arr = [
                'nama' => $d['nama'], 
                'deskripsi' => $d['deskripsi'], 
                'harga' => $d['harga'],
                'id_kategori' => $d['kategori'],
            ];


            $this->kos->Update($arr, "WHERE id = $id");

            Response::redirectWithAlert('admin/kos/', ['info', 'Kos berhasil diedit']);
        }
        catch(Exception $e) {

            $this->edit($id);
        }
    }

    public function delete($id) {
        $this->kos->delete("WHERE id='$id'");
        Response::redirectWithAlert('admin/kos/', ['info', "Berhasil menghapus akun"]);
    }

    public function detail($id){
        $data = $this->kos->Select("k.id, k.nama as nama_kos, k.deskripsi, k.jumlah_kamar, k.harga, k.tanggal_ditambahkan, p.nama", " k JOIN pengguna p ON k.ditambahkan_oleh=p.id", "WHERE k.id='$id'")[1][0];
        $media = $this->media->Select("*", "WHERE id_kos='$data[id]'")[1];
        // echo "<pre>";
        // print_r($media);
        // echo "</pre>";
        Response::render('front/index', ['title' => 'Detail', 'content' => 'kos/detail', 'type' => 'Tambah', 'data' => $data, 'media' => $media]);
    }
}