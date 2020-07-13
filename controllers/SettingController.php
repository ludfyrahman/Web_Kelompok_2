<?php
App::loadModels(['Pengguna', 'pemesanan']);
class SettingController {
    private $pengguna, $pemesanan;

    public function __construct() {
        $this->pengguna = new pengguna;
        $this->pemesanan = new pemesanan;
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
        $this->send("dawiyahrubi@gmail.com", $to, $subject, "<h1>Verifikasi Akun ".Account::get("nama")."</h1><p>masukkan kode <b>".$kode." untuk verifikasi akun anda<p>");
    }
    public function lupa_password_email($from, $to){
        $kode = App::RandomString(5);
        $this->pengguna->update(["verification" => $kode], "WHERE email='$to'");
        $this->send("dawiyahrubi@gmail.com", $to, "Subject", "<h1>Verifikasi Password $to </h1><p>klik link <b><a href=".BASEURL."ubah_password/$kode".">".$kode."</a> untuk mengubah password anda<p>");
    }
    public function verifikasi($id){
        $q = $this->pengguna->select("*", "WHERE verification='$id'");
        if($q[0] > 0 ){
            $this->pengguna->update(['status' => 1], "WHERE verification='$id'");
            Response::redirectWithAlert('pengguna/login', ['info', 'Verifikasi Akun Berhasil']);
        }else{
            Response::redirectWithAlert('pengguna/login', ['info', 'Verifikasi Akun Gagal']);
        }
    }
    public function notifikasi_pembayaran($from, $to, $kode){
        $d = $this->pemesanan->select("p.id, pg.nama, p.tanggal_pemesanan, k.nama,p.status, k.harga", "p JOIN pengguna pg on p.id_pengguna=pg.id JOIN kos k on p.id_kos=k.id", "WHERE p.id='$kode'")[1][0];
        $invoice = invoice_code."".$d['id'];
        $status = "DP";
        $tempo = date('Y-m-d H:i:s', strtotime($d['tanggal_pemesanan']."+1 day"));
        $harga = 25 * $d['harga'] / 100;
        if($d['status'] == 1){
            $status = "DP";
            $tempo = date('Y-m-d H:i:s', strtotime($d['tanggal_pemesanan']."+1 day"));
            $harga = 25 * $d['harga'] / 100;
        }else if($d['status'] == 3){
            $status = "Pelunasan";
            $tempo = date('Y-m-d H:i:s', strtotime($d['tanggal_pemesanan']."+4 day"));
            $harga = ($d['harga'] - (25 * $d['harga'] / 100));
        }
        $subject = "Pembayaran Kos";
        $email = new \SendGrid\Mail\Mail(); 
        $email->setFrom($from, "Pembayaran Pemesanan Kos ".$d['nama']);
        $email->setSubject($subject);
        $email->addTo($to, "Notifikasi Pembayaran $status");
        $email->addContent("text/html", 
        "<h1>Pembayaran Kos $d[nama] $invoice</h1>
        <p>Kami menginformasikan bahwa pembayaran kos hampir jatuh tempo $tempo sebesar<p>
        <h3>$harga</h3>");
        $sg = new \SendGrid(SENDGRID_API_KEY);

        $response = $sg->client->mail()->send()->post($email);
                
        if ($response->statusCode() == 202) {
            echo 'done';
        } else {
            echo 'false';
        }
    }
    public function verification_code_hp($to){
        // $kode = App::RandomString(5);
        // // $this->pengguna->update(["verification" => $kode], "WHERE id=".Account::get("id"));
        // $sms = new NexmoMessage(NEXMO_API_KEY, NEXMO_API_SECRET);
        // $sms->sendText( $to, 'Papikos', 'Kode Verifikasi '.$kode." " );
        $basic  = new \Nexmo\Client\Credentials\Basic('68206d0a', 'H9nFINin9ytRgmeT');
        $client = new \Nexmo\Client($basic);

        $message = $client->message()->send([
            'to' => '6282231425636',
            'from' => 'Vonage APIs',
            'text' => 'Hello from Vonage SMS API'
        ]);
    }
    public function notifikasi_pembayaran_noHp($to){
        $kode = App::RandomString(5);
        $this->pengguna->update(["verification" => $kode], "WHERE id=".Account::get("id"));
        $sms = new NexmoMessage(NEXMO_API_KEY, NEXMO_API_SECRET);
        $sms->sendText( $to, 'Papikos', 'Kode Verifikasi '.$kode." " );
    }
    public function tampil(){
        echo "ada ada aja";
    }
    public function send($from, $to, $subject, $body){
        $mail = new PHPMailer;

        //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'dawiyahrubi@gmail.com';                 // SMTP username
        $mail->Password = 'rubilemupanda';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to

        $mail->setFrom($from, 'papikos');
        $mail->addAddress($to, 'User');     // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        // $mail->isHTML(true);                                  // Set email format to HTML

        $mail->IsHTML(true); 
        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->AltBody = 'jangan lupa';

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
    }
}