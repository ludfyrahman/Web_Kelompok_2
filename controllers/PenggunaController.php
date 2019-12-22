<?php

include "SettingController.php";
class PenggunaController {
    private $pengguna, $setting;
    
    public function __construct() {
        $this->pengguna = new pengguna;
        $this->setting = new SettingController();
    }
    public function logout() {
        // echo "keluar";
        unset($_SESSION['userid']);
        unset($_SESSION['userlevel']);

        Response::redirectWithAlert('pengguna/login', ['info', 'Logout berhasil']);
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

    public function lupa_password() {
        Response::render('front/index', ['title' => 'Lupa Password', 'content' => 'user/lupa_password']);
    }
    public function ubah_password($kode) {
        Response::render('front/index', ['title' => 'Ubah Password', 'content' => 'user/password']);
    }
    public function proses_ubah_password($kode){
        $d = $_POST;
        try {
            // echo "password lama "
            if($d['new_password'] != $d['password_confirmation']) {
                $_SESSION['alert'] = ['danger', 'Password konfirmasi tidak sama'];
                // echo "password konfirmasi tidak sama";
                return $this->ubah_password($kode);
            }

            $arr = ['password' => password_hash($d['new_password'], PASSWORD_DEFAULT)];

            $this->pengguna->Update($arr, "WHERE verification = '$kode'");

            Response::redirectWithAlert('/pengguna/login', ['success', 'Password berhasil diubah']);
        }
        catch(Exception $e) {
            $this->password();
        }
    }
    public function proses_forgot_password(){
        $d = $_POST;
        $c = $this->pengguna->select("*", "WHERE email='$d[email]'");
        if($c[0] > 0 ){
            $this->lupa_password_email("papikos@gmail.com", "ludfyr@gmail.com");
            // echo "ada cek email";
            $_SESSION['alert'] = ['info', 'Verifikasi Terkirim ke email '.$c['email']];
            return $this->lupa_password();
        }else{
            $_SESSION['alert'] = ['info', 'Email anda tidak terdaftar di aplikasi'];
            return $this->lupa_password();
        }
    }
    public function lupa_password_email($from, $to){
        $kode = App::RandomString(5);
        $this->pengguna->update(["verification" => $kode], "WHERE email='$to'");
        $subject = "Lupa Password";
        $email = new \SendGrid\Mail\Mail(); 
        $email->setFrom($from, "Lupa Password Akun Papikos");
        $email->setSubject($subject);
        $email->addTo($to, "Sesama Korban Ditabrak Cewek");
        $email->addContent("text/html", "<h1>Verifikasi Password $to </h1><p>klik link <b><a href=".BASEURL."ubah_password/$kode".">".$kode."</a> untuk mengubah password anda<p>");
        $sg = new \SendGrid(SENDGRID_API_KEY);

        $response = $sg->client->mail()->send()->post($email);
                
        if ($response->statusCode() == 202) {
            // Successfully sent
            echo 'done';
        } else {
            echo 'false';
        }
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

            return $this->profile();
        }
    }

    public function proses_password() {
        $d = $_POST;
        try {
            // echo "password lama "
            if(!password_verify($d['old_password'], Account::Get('password'))) {
                $_SESSION['alert'] = ['danger', 'Password lama tidak sama'];
                // echo "password lama tidak sama";
                return $this->profil();
            }
            if($d['new_password'] != $d['password_confirmation']) {
                $_SESSION['alert'] = ['danger', 'Password konfirmasi tidak sama'];
                // echo "password konfirmasi tidak sama";
                return $this->profil();
            }

            

            $arr = ['password' => password_hash($d['new_password'], PASSWORD_DEFAULT)];

            $this->pengguna->Update($arr, "WHERE id = $_SESSION[userid]");

            Response::redirectWithAlert('pengguna/profil', ['success', 'Password berhasil diubah']);
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

    public function loginfb(){
        $fb = new Facebook\Facebook([
            'app_id' => APP_FACEBOOK_ID,
            'app_secret' => APP_FACEBOOK_SECRET,
            'default_graph_version' => 'v3.2',
            ]);
          
          $helper = $fb->getRedirectLoginHelper();
          
          $permissions = ['email']; // Optional permissions
          $loginUrl = $helper->getLoginUrl('http://localhost/papikos/helpers/facebook/fb-callback.php', $permissions);
          
          echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
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
                return $this->login();
            }

            $arr = ['nama' => $d['nama'], 'email' => $d['email'], 'password' => password_hash($d['password'], PASSWORD_DEFAULT), 'level' => 3];
            $this->pengguna->Insert($arr);
            Response::redirectWithAlert('login/', ['info', 'Register berhasil, anda dapat login']);
        }
        catch(Exception $e) {
            if($e->errorInfo[2] == "Duplicate entry '$d[email]' for key 'email'")
                $_SESSION['alert'] = ['danger', 'Email sudah terpakai'];
            Response::redirectWithAlert('login/', ['info', 'Register berhasil, anda dapat login']);
        }
    }

}