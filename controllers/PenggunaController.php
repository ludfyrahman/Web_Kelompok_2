<?php


class PenggunaController {
    private $pengguna;
    

    public function __construct() {
        $this->pengguna = new pengguna;
    }
    public function logout() {
        // echo "keluar";
        unset($_SESSION['userid']);
        unset($_SESSION['userlevel']);

        Response::redirectWithAlert('/', ['info', 'Logout berhasil']);
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
        $f = $_FILES;

        try {
            $arr = [
                'nama' => $d['nama'], 
                'email' => $d['email'], 
                'password' => password_hash($d['password'], PASSWORD_DEFAULT), 
                'level' => $d['level'],
                'status' => $d['status'],
                'nik' => $d['nik'], 
                'no_hp' => $d['no_hp'], 
                'jenis_kelamin' => $d['jenis_kelamin'],
                'tanggal_lahir' => $d['tanggal_lahir'],
                'nama_rekening' => $d['nama_rekening'],
                'no_rekening' => $d['no_rekening'],
                'nama_bank' => $d['nama_bank'],
                'alamat' => "jalan pakisan desa bataan tenggarang bondowoso",
                'tanggal_ditambahkan' => date('Y-m-d'),
            ];
            if(App::validateSizeUpload(20097152 , $f['ktp'])){
                if(App::validateTypeUpload(['image/png', 'image/jpg', 'image/jpeg'], $f['ktp'])){
                    if(App::validateSizeUpload(20097152 , $f['profil'])){
                        if(App::validateTypeUpload(['image/png', 'image/jpg', 'image/jpeg'], $f['profil'])){
                            $f['profil']['name'] = $d['email'].".".str_replace("image/", "", $f['profil']['type']);
                            $f['ktp']['name'] = $d['email'].".".str_replace("image/", "", $f['ktp']['type']);
                            App::UploadImage($f['profil'], "profil");
                            App::UploadImage($f['ktp'], "ktp");
                            $arr['ktp'] = $f['ktp']['name'];
                            $arr['profil'] = $f['profil']['name'];
                            if($d['password'] != $d['password_konfirmasi']){
                                $_SESSION['alert'] = ['danger', 'Password konfirmasi dengan password tidak sama'];
                                $this->add();
                                Response::redirectWithAlert('admin/pengguna/', ['info', 'pengguna berhasil ditambahkan']);
                            }else{
                                $arr['password'] = password_hash($d['password'], PASSWORD_DEFAULT);
                            }
                            $this->pengguna->Insert($arr);
                        }else{
                            $_SESSION['alert'] = ['danger', 'foto profile yang anda upload tidak sesuai.'];
                            $this->add();
                        }
                    }
                    // $this->karyawan->Insert($arr);
                }else{
                    $_SESSION['alert'] = ['danger', 'ktp yang anda upload tidak sesuai.'];
                    $this->add();
                }
            }
            

        }
        catch(Exception $e) {
            // if($e->errorInfo[2] == "Duplicate entry '$d[email]' for key 'email'")
            print_r($e);
            $_SESSION['alert'] = ['danger', 'error'];
            $this->add();
        }
    }

    public function update($id) {
        $d = $_POST;
        $f = $_FILES;

        try {
            $arr = [
                'nama' => $d['nama'], 
                'email' => $d['email'], 
                'level' => $d['level'],
                'status' => $d['status'],
                'nik' => $d['nik'], 
                'no_hp' => $d['no_hp'], 
                'jenis_kelamin' => $d['jenis_kelamin'],
                'tanggal_lahir' => $d['tanggal_lahir'],
                'nama_rekening' => $d['nama_rekening'],
                'no_rekening' => $d['no_rekening'],
                'nama_bank' => $d['nama_bank'],
                'alamat' => $d['alamat'],
                'tanggal_ditambahkan' => date('Y-m-d'),
            ];
            if($f['ktp']['name'] !=''){
                if(App::validateSizeUpload(20097152 , $f['ktp'])){
                    if(App::validateTypeUpload(['image/png', 'image/jpg', 'image/jpeg'], $f['ktp'])){
                        $f['ktp']['name'] = $d['email'].".".str_replace("image/", "", $f['ktp']['type']);
                        App::UploadImage($f['ktp'], "ktp");
                        $arr['ktp'] = $f['ktp']['name'];
                    }else{
                        $_SESSION['alert'] = ['danger', 'ktp yang anda upload tidak sesuai.'];
                        $this->add();
                    }
                }
            }
            if($f['profil']['name'] !=''){
                if(App::validateSizeUpload(20097152 , $f['profil'])){
                    if(App::validateTypeUpload(['image/png', 'image/jpg', 'image/jpeg'], $f['profil'])){
                        $f['profil']['name'] = $d['email'].".".str_replace("image/", "", $f['profil']['type']);
                        App::UploadImage($f['profil'], "profil");
                        $arr['profil'] = $f['profil']['name'];
                    }else{
                        $_SESSION['alert'] = ['danger', 'foto profile yang anda upload tidak sesuai.'];
                        $this->add();
                    }
                }
            }
            if(Input::postOrOr('password') != ''){
                if($d['password'] != $d['password_konfirmasi']){
                    Response::redirectWithAlert('admin/pengguna/'.$id."/edit", ['info', 'Password konfirmasi dengan password tidak sama']);
                }else{
                    $arr['password'] = password_hash($d['password'], PASSWORD_DEFAULT);
                }
            }
            $this->pengguna->Update($arr, "WHERE id = $id");

            // Response::redirectWithAlert('admin/pengguna/', ['info', 'pengguna berhasil diedit']);
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

    public function profil() {
        Response::render('front/index', ['title' => 'Profil '.Account::Get('nama'), 'content' => 'user/profil']);
    }

    public function password() {
        // if($_SESSION['userlevel'] == 1)
        //     Response::render('back/index', ['title' => 'Ubah Password', 'content' => 'password']);
        // else if($_SESSION['userlevel'] == 2)
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
        // echo CLIENT_REDIRECT_URL;
        $gmail_url = 'https://accounts.google.com/o/oauth2/v2/auth?scope=' . urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . CLIENT_ID . '&access_type=online';
        Response::render('front/index', ['title' => 'Login Papikos', 'content' => 'user/login', 'gmail' => $gmail_url]);
    }

   

    public function register() {
        
        Response::render('front/index', ['title' => 'Register Jelajahin', 'content' => 'user/register']);
    }

    public function proses_login() {
        $d = $_POST;

        try {
            $a = $this->pengguna->Select('*', "WHERE email = '$d[email]'")[1];

            if(count($a) < 1) {
                $_SESSION['alert'] = ['danger', "Login gagal, email anda tidak terdaftar silahkan cek kembali"];
                return $this->login();
            }
            if($a[0]['status'] == 0) {
                $_SESSION['alert'] = ['danger', "Login gagal, akun anda belum diaktifasi"];
                return $this->login();
            }
            $a = $a[0];

            if(!password_verify($d['password'], $a['password'])) {
                $_SESSION['alert'] = ['danger', "Login gagal, password anda salah silahkan cek kembali"];
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

}