<?php


class PenggunaController {
    private $pengguna;

    public function __construct() {
        $this->pengguna = new pengguna;
    }

    public function index() {
        $lists = $this->pengguna->Select('*', "", "ORDER BY id DESC");
        Response::render('back/index', ['title' => 'Daftar pengguna', 'content' => 'pengguna/index', 'list' => $lists[1]]);
    }

    public function add() {
        Response::render('back/index', ['title' => 'Tambah pengguna', 'content' => 'pengguna/_form', 'type' => 'Tambah', 'data' => null]);
    }

    public function edit($id) {
        $data = $this->pengguna->Select("*", "WHERE id = $id")[1];

        if(count($data) < 1)
            Router::not_found();

        Response::render('back/index', ['title' => 'Edit pengguna', 'content' => 'pengguna/_form', 'type' => 'Edit', 'data' => $data[0]]);
    }

    public function store() {
        $d = $_POST;

        try {
            $arr = [
                'nama' => $d['nama'], 
                'email' => $d['email'], 
                'no_hp' => $d['no_hp'], 
                'password' => password_hash($d['password'], PASSWORD_DEFAULT), 
                'level' => $d['level'],
                'tanggal_ditambahkan' => date('Y-m-d'),
            ];
            if($d['password'] != $d['password_konfirmasi']){
                // Response::redirectWithAlert('admin/pengguna/add', ['danger', 'Password konfirmasi dengan password tidak sama']);
                $_SESSION['alert'] = ['danger', 'Password konfirmasi dengan password tidak sama'];
                $this->add();
            }else{
                $arr['password'] = password_hash($d['password'], PASSWORD_DEFAULT);
            }
            $this->pengguna->Insert($arr);

            Response::redirectWithAlert('admin/pengguna/', ['info', 'pengguna berhasil ditambahkan']);
        }
        catch(Exception $e) {
            // if($e->errorInfo[2] == "Duplicate entry '$d[email]' for key 'email'")
            // print_r($e);
            $_SESSION['alert'] = ['danger', 'error'];
            $this->add();
        }
    }

    public function update($id) {
        $d = $_POST;

        try {
            $arr = ['name' => $d['name'], 'email' => $d['email'], 'no_hp' => $d['no_hp'], 'level' => $d['level']];

            if(Input::postOrOr('password') != ''){
                if($d['password'] != $d['password_konfirmasi']){
                    // $_SESSION['alert'] = ['danger', "Password konfirmasi dengan password tidak sama"];
                    // $this->add();
                    Response::redirectWithAlert('admin/pengguna/'.$id."/edit", ['info', 'Password konfirmasi dengan password tidak sama']);
                }else{
                    $arr['password'] = password_hash($d['password'], PASSWORD_DEFAULT);
                }
            }

            $this->pengguna->Update($arr, "WHERE id = $id");

            Response::redirectWithAlert('admin/pengguna/', ['info', 'pengguna berhasil diedit']);
        }
        catch(Exception $e) {
            if($e->errorInfo[2] == "Duplicate entry '$d[email]' for key 'email'")
                $_SESSION['alert'] = ['danger', 'Email sudah terpakai'];

            $this->edit($id);
        }
    }

    public function delete($id) {
        $this->pengguna->delete("WHERE id='$id'");
        Response::redirectWithAlert('admin/pengguna/', ['info', "Berhasil menghapus pengguna"]);
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

            $this->pengguna->Update($arr, "WHERE id = $_SESSION[userid]");

            if($_SESSION['userlevel'] == 1)
                Response::redirectWithAlert('admin/profile/', ['info', 'pengguna berhasil diedit']);
            else if($_SESSION['userlevel'] == 2)
                Response::redirectWithAlert('user/profile/', ['info', 'pengguna berhasil diedit']);
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

            if(!password_verify($d['old_password'], pengguna::Get('password'))) {
                $_SESSION['alert'] = ['danger', 'Password lama tidak sama'];
                return $this->password();
            }

            $arr = ['password' => password_hash($d['password'], PASSWORD_DEFAULT)];

            $this->pengguna->Update($arr, "WHERE id = $_SESSION[userid]");

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
            $a = $this->pengguna->Select('*', "WHERE email = '$d[email]'")[1];

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

            $this->pengguna->Insert($arr);

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