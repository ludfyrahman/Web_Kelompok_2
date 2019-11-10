<?php
class KategoriController {
    private $kategori;

    public function __construct() {
        $this->kategori = new Kategori;
    }

    public function index() {
        $lists = $this->kategori->select("*", "", "ORDER BY id desc")[1];
        Response::render('back/index', ['title' => 'Daftar Kategori', 'content' => 'kategori/index', 'list' => $lists]);

    }

    public function add() {
        Response::render('back/index', ['title' => 'Tambah kategori', 'content' => 'kategori/_form', 'type' => 'Tambah', 'data' => null]);
    }

    public function edit($id) {
        $data = $this->kategori->Select("*", "WHERE id = $id")[1];
        $kategori = $this->kategori->Select("*", "", "ORDER by id asc");
        if(count($data) < 1)
            Router::not_found();
        Response::render('back/index', ['title' => 'Edit kategori', 'content' => 'kategori/_form', 'type' => 'Edit', 'data' => $data[0], 'kategori' => $kategori[1]]);
    }

    public function store() {
        $d = $_POST;

        try {
            $arr = [
                'nama' => $d['nama'], 
                'tanggal_ditambahkan' => date("Y-m-d H:i:s"),
                'ditambahkan_oleh' => 7
            ];

            $this->kategori->Insert($arr);

            Response::redirectWithAlert('admin/kategori/', ['info', 'kategori berhasil ditambahkan']);
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
            ];


            $this->kategori->Update($arr, "WHERE id = $id");

            Response::redirectWithAlert('admin/kategori/', ['info', 'kategori berhasil diedit']);
        }
        catch(Exception $e) {

            $this->edit($id);
        }
    }

    public function delete($id) {
        // $this->akun->CustomQuery("SELECT DISTINCT(id) from pemesanan where tanggal BETWEEN '2019-02-02' and '2019-02-06'");
        $this->kategori->delete("WHERE id='$id'");
        Response::redirectWithAlert('admin/kategori/', ['info', "Berhasil menghapus akun"]);
    }

}