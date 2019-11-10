<?php

App::loadModels(['kategori']);
class FasilitasController {
    private $fasilitas, $kategori;

    public function __construct() {
        $this->fasilitas = new Fasilitas;
        $this->kategori = new Kategori;
    }

    public function index() {
        $lists = $this->fasilitas->Select("*", "", "ORDER By id desc");
        Response::render('back/index', ['title' => 'Daftar Akun', 'content' => 'fasilitas/index', 'list' => null]);

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

    public function store() {
        $d = $_POST;

        try {
            $arr = [
                'nama' => $d['nama'], 
                'deskripsi' => $d['deskripsi'], 
                // // 'password' => password_hash($d['password'], PASSWORD_DEFAULT), 
                'harga' => $d['harga'],
                'id_kategori' => $d['kategori'],
                'tanggal_ditambahkan' => date("Y-m-d H:i:s"),
                'ditambahkan_oleh' => 7
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
                // // 'password' => password_hash($d['password'], PASSWORD_DEFAULT), 
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
        // $this->akun->CustomQuery("SELECT DISTINCT(id) from pemesanan where tanggal BETWEEN '2019-02-02' and '2019-02-06'");
        $this->kos->delete("WHERE id='$id'");
        Response::redirectWithAlert('admin/kos/', ['info', "Berhasil menghapus akun"]);
    }

    public function profile() {
        if($_SESSION['userlevel'] == 1)
            Response::render('back/index', ['title' => 'Ubah Profil', 'content' => 'profile']);
        else if($_SESSION['userlevel'] == 2)
            Response::render('front/index', ['title' => 'Ubah Profil', 'content' => 'user/profile']);
    }

    public function password() {
        if($_SESSION['userlevel'] == 1)
            Response::render('back/index', ['title' => 'Ubah Password', 'content' => 'password']);
        else if($_SESSION['userlevel'] == 2)
            Response::render('front/index', ['title' => 'Ubah Password', 'content' => 'user/password']);
    }

    public function proses_profile() {
        $d = $_POST;

        try {
            $arr = ['name' => $d['name'], 'email' => $d['email']];

            $this->akun->Update($arr, "WHERE id = $_SESSION[userid]");

            if($_SESSION['userlevel'] == 1)
                Response::redirectWithAlert('admin/profile/', ['info', 'Akun berhasil diedit']);
            else if($_SESSION['userlevel'] == 2)
                Response::redirectWithAlert('user/profile/', ['info', 'Akun berhasil diedit']);
        }
        catch(Exception $e) {
            if($e->errorInfo[2] == "Duplicate entry '$d[email]' for key 'email'")
                $_SESSION['alert'] = ['danger', 'Email sudah terpakai'];

            $this->profile();
        }
    }

    public function proses_password() {
        $d = $_POST;

        try {
            if($d['password'] != $d['password_confirmation']) {
                $_SESSION['alert'] = ['danger', 'Password konfirmasi tidak sama'];
                return $this->password();
            }

            if(!password_verify($d['old_password'], Account::Get('password'))) {
                $_SESSION['alert'] = ['danger', 'Password lama tidak sama'];
                return $this->password();
            }

            $arr = ['password' => password_hash($d['password'], PASSWORD_DEFAULT)];

            $this->akun->Update($arr, "WHERE id = $_SESSION[userid]");

            if($_SESSION['userlevel'] == 1)
                Response::redirectWithAlert('admin/password/', ['info', 'Password berhasil diedit']);
            else if($_SESSION['userlevel'] == 2)
                Response::redirectWithAlert('user/password/', ['info', 'Password berhasil diedit']);
        }
        catch(Exception $e) {
            $this->password();
        }
    }

    public function login() {
        Response::render('front/index', ['title' => 'Login Jelajahin', 'content' => 'user/login']);
    }

    public function register() {
        Response::render('front/index', ['title' => 'Register Jelajahin', 'content' => 'user/register']);
    }

    public function proses_login() {
        $d = $_POST;

        try {
            $a = $this->akun->Select('*', "WHERE email = '$d[email]'")[1];

            if(count($a) < 1) {
                $_SESSION['alert'] = ['danger', "Login gagal, silahkan cek kembali"];
                return $this->login();
            }

            $a = $a[0];

            if(!password_verify($d['password'], $a['password'])) {
                $_SESSION['alert'] = ['danger', "Login gagal, silahkan cek kembali"];
                return $this->login();
            }

            $_SESSION['userid'] = $a['id'];
            $_SESSION['userlevel'] = $a['level'];

            Response::redirect('');
        }
        catch(Exception $e) {
            $this->login();
        }
    }

    public function proses_register() {
        $d = $_POST;

        try {
            if($d['password'] != $d['password_confirmation']) {
                $_SESSION['alert'] = ['danger', "Password konfirmasi harus sama"];
                return $this->register();
            }

            $arr = ['name' => $d['name'], 'email' => $d['email'], 'password' => password_hash($d['password'], PASSWORD_DEFAULT), 'level' => 2];

            $this->akun->Insert($arr);

            Response::redirectWithAlert('login/', ['info', 'Register berhasil, anda dapat login']);
        }
        catch(Exception $e) {
            if($e->errorInfo[2] == "Duplicate entry '$d[email]' for key 'email'")
                $_SESSION['alert'] = ['danger', 'Email sudah terpakai'];

            $this->register();
        }
    }

    public function logout() {
        unset($_SESSION['userid']);
        unset($_SESSION['userlevel']);

        Response::redirectWithAlert('login/', ['info', 'Logout berhasil']);
    }
}