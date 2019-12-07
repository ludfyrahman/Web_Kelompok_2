<?php

App::loadModels(['kategori', 'media', 'fasilitas', 'sub_fasilitas']);
class KosController {
    private $kos, $kategori, $media;

    public function __construct() {
        $this->kos = new Kos;
        $this->kategori = new Kategori;
        $this->media = new Media;
        $this->fasilitas = new Fasilitas;
        $this->sub_fasilitas = new Sub_fasilitas;
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
        $data = $this->kos->Select("k.id, k.nama as nama_kos,k.tanggal_diubah, k.latitude, k.longitude, k.deskripsi, k.jumlah_kamar, k.harga, k.tanggal_ditambahkan, p.nama", " k JOIN pengguna p ON k.ditambahkan_oleh=p.id", "WHERE k.id='$id'")[1][0];
        $media = $this->media->Select("*", "WHERE id_kos='$data[id]'")[1];
        $fasilitas = $this->fasilitas->Select("*", "WHERE id_kos='$data[id]'")[1];
        // echo "<pre>";
        $index = 0;
        $index = 0;
        $subfas = array();
        foreach($fasilitas as $f){
            $subfas[$index] = $f;
            $sub_fasilitas = $this->sub_fasilitas->Select("*", "WHERE id_fasilitas='$f[id]'")[1];
            $in = 0;
            foreach($sub_fasilitas as $sub){
                $subfas[$index]['sub'][$in] = $sub;
                $in++;
            }
            $index++;
        }
        // print_r($subfas);
        
        // echo "</pre>";
        Response::render('front/index', ['title' => $data['nama_kos'], 'content' => 'kos/detail', 'type' => 'Tambah', 'data' => $data, 'media' => $media, 'subfas' => $subfas]);
    }
    public function pesan($id){
        $data = $this->kos->Select("k.id, k.nama as nama_kos,k.tanggal_diubah, k.latitude, k.longitude, k.deskripsi, k.jumlah_kamar, k.harga, k.tanggal_ditambahkan, p.nama", " k JOIN pengguna p ON k.ditambahkan_oleh=p.id", "WHERE k.id='$id'")[1][0];
        $media = $this->media->Select("*", "WHERE id_kos='$data[id]' LIMIT 1")[1][0];
        if(!isset($_SESSION['userid'])){
            Response::render('front/index', ['title' => 'Login Jelajahin', 'content' => 'user/login']);
        }else{
            Response::render('front/index', ['title' => "Pesan ".$data['nama_kos'], 'content' => 'kos/pesan', 'type' => 'Tambah', 'data' => $data, 'media' => $media]);
        }
    }
    public function semua(){
        $d = $_POST;
        $pencarian = " ";
        if(isset($d['search'])){
            $pencarian = "Where ";
            $cari = "";
            if(isset($d['cari']) != ""){
                $cari = (isset($d['cari']) ? " k.nama like  '%".$d['cari']."%'" : '');
            }
            $kategori = "";
            if(isset($d['kategori'])){
                if($d['kategori'] != ""){
                    $kategori = (isset($d['kategori']) ? " and k.id_kategori ='".$d['kategori']."'" : '');
                }
            }
            $tipe = "";
            if(isset($d['tipe']) != ""){
                if($d['tipe'] != ""){
                    $tipe = (isset($d['tipe']) ? " and k.jenis ='".$d['tipe']."'" : '');
                }
            }
            $urut = " ORDER By ";
            if (isset($d['urut'])) {
                if ($d['urut'] == 1) {
                    $urut .= " k.id desc";
                }else if($d['urut'] = 2){
                    $urut .= " k.harga asc";
                }else if($d['urut'] = 3){
                    $urut .= " k.harga desc";
                }
            }
            $harga = "";
            if(isset($d['harga_awal'])){
                if(($d['harga_awal'] !="" ) && ($d['harga_tertinggi'] != "")){
                    $harga = " AND k.harga BETWEEN '$d[harga_awal]' AND '$d[harga_tertinggi]'";
                }
            }
            
            $pencarian.=" $cari $kategori $tipe $harga $urut";
            // SELECT *, ( 3959 * acos ( cos ( radians($key) ) * cos( radians( latitude) ) * cos( radians( longitude ) - radians($user) ) + sin ( radians($key) ) * sin( radians( latitude ) ) ) ) AS distance FROM outlet HAVING distance < 500 order by distance asc
            // SELECT *, ( 3959 * acos ( cos ( radians(-7.1786496) ) * cos( radians( latitude) ) * cos( radians( longitude ) - radians(113.4657536) ) + sin ( radians(-7.1786496) ) * sin( radians( latitude ) ) ) ) AS distance FROM kos HAVING distance < 500 order by distance asc
            // 1 mile = 1,609 
            //key latitude and $user longitude
        }
        // echo "id kategori ".$d['kategori']."<br>";
        // echo $pencarian;
        $kos = $this->kos->Select('k.nama, k.id, k.deskripsi, k.tanggal_ditambahkan, p.nama as nama_pemilik, k.harga, m.link_media', " k LEFT JOIN pengguna p on k.ditambahkan_oleh=p.id LEFT JOIN (SELECT link_media, id, id_kos FROM media LIMIT 1) m on k.id=m.id_kos ", " $pencarian ");
        $kategori = $this->kategori->Select("*", '')[1];
        Response::render('front/index', ['title' => 'Semua Kos', 'content' => 'kos/semua','data' => $kos[1], 'kategori' => $kategori]);
    }
    
}