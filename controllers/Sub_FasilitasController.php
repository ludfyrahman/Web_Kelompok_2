<?php

App::loadModels(['fasilitas']);
class Sub_FasilitasController {
    private $fasilitas, $sub_fasilitas;

    public function __construct() {
        $this->sub_fasilitas = new Sub_Fasilitas;
        $this->fasilitas = new Fasilitas;
    }

    public function index() {
        $lists = $this->sub_fasilitas->Select("sb.*, f.nama as fasilitas", " sb JOIN fasilitas f ON f.id=sb.id_fasilitas", "ORDER By id desc");
        Response::render('back/index', ['title' => 'Daftar Fasilitas', 'content' => 'sub_fasilitas/index', 'list' => $lists[1]]);

    }

    public function add() {
        $fasilitas = $this->fasilitas->Select("*", "", "ORDER by id asc");
        Response::render('back/index', ['title' => 'Tambah fasilitas', 'content' => 'sub_fasilitas/_form', 'type' => 'Tambah', 'data' => null, 'fasilitas' => $fasilitas[1]]);
    }

    public function edit($id) {
        $data = $this->sub_fasilitas->Select("*", "WHERE id = $id")[1];
        $fasilitas = $this->fasilitas->Select("*", "", "ORDER by id asc");
        if(count($data) < 1)
            Router::not_found();
        Response::render('back/index', ['title' => 'Edit fasilitas', 'content' => 'sub_fasilitas/_form', 'type' => 'Edit', 'data' => $data[0], 'fasilitas' => $fasilitas[1]]);
    }

    public function store() {
        $d = $_POST;

        try {
            $arr = [
                'nama' => $d['nama'], 
                'id_fasilitas' => $d['fasilitas'], 
            ];

            $this->sub_fasilitas->Insert($arr);

            Response::redirectWithAlert('admin/sub_fasilitas/', ['info', 'fasilitas berhasil ditambahkan']);
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
                'id_fasilitas' => $d['fasilitas'], 
            ];


            $this->sub_fasilitas->Update($arr, "WHERE id = $id");

            Response::redirectWithAlert('admin/sub_fasilitas/', ['info', 'fasilitas berhasil diedit']);
        }
        catch(Exception $e) {

            $this->edit($id);
        }
    }

    public function delete($id) {
        // $this->akun->CustomQuery("SELECT DISTINCT(id) from pemesanan where tanggal BETWEEN '2019-02-02' and '2019-02-06'");
        $this->sub_fasilitas->delete("WHERE id='$id'");
        Response::redirectWithAlert('admin/sub_fasilitas/', ['info', "Berhasil menghapus akun"]);
    }
}