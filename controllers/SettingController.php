<?php
App::loadModels(['Pengguna']);
class SettingController {
    private $pengguna;

    public function __construct() {
        $this->pengguna = new pengguna;
    }

    public function index() {
        // $lists = $this->kategori->select("*", "", "ORDER BY id desc")[1];
        $gmail = null;
        $facebook = null;
        Response::render('back/index', ['title' => 'Setting', 'content' => 'setting/index', 'gmail' => $gmail, 'facebook' => $facebook]);

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
                'ditambahkan_oleh' => Account::Get('id')
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
    public function verification_code($from, $to){
        $kode = App::RandomString(5);
        $this->pengguna->update(["verification" => $kode], "WHERE id=".Account::get("id"));
        $subject = "Verifikasi Email";
        $email = new \SendGrid\Mail\Mail(); 
        $email->setFrom($from, "Verifikasi Email Papikos");
        $email->setSubject($subject);
        $email->addTo($to, "Verifikasi Akun");
        $email->addContent("text/html", "<h1>Verifikasi Akun ".Account::get("nama")."</h1><p>masukkan kode <b>".$kode." untuk verifikasi akun anda<p>");
        $sg = new \SendGrid(SENDGRID_API_KEY);

        $response = $sg->client->mail()->send()->post($email);
                
        if ($response->statusCode() == 202) {
            // Successfully sent
            echo 'done';
        } else {
            echo 'false';
        }
    }
    public function verification_code_hp($to){
        $kode = App::RandomString(5);
        $this->pengguna->update(["verification" => $kode], "WHERE id=".Account::get("id"));
        $sms = new NexmoMessage(NEXMO_API_KEY, NEXMO_API_SECRET);
        $sms->sendText( $to, 'Papikos', 'Kode Verifikasi '.$kode." " );
    }
    public function tampil(){
        echo "ada ada aja";
    }
}