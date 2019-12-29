<?php

App::loadModels(['kategori', 'media', 'fasilitas_kos', 'sub_fasilitas', 'favorit', 'ulasan', 'fasilitas']);
class KosController {
    private $kos, $kategori, $media, $fasilitas;

    public function __construct() {
        $this->kos = new Kos;
        $this->kategori = new Kategori;
        $this->media = new Media;
        $this->fasilitas_kos = new fasilitas_kos;
        $this->sub_fasilitas = new Sub_fasilitas;
        $this->favorit = new favorit;
        $this->fasilitas = new fasilitas;
        $this->ulasan = new ulasan;
        // echo App::uri(4);
    }

    public function index() {
        $where = "";
        if(Account::get('level') == 2){
            $where = " WHERE p.id=".Account::get('id');
        }
        $lists = $this->kos->customSelect("SELECT k.id, k.nama,k.harga, ka.nama as nama_kategori from kos k JOIN kategori ka ON k.id_kategori=ka.id JOIN pengguna p on k.ditambahkan_oleh=p.id $where ORDER BY k.id asc");
        Response::render('back/index', ['title' => 'Daftar Kos', 'content' => 'kos/index', 'list' => $lists]);

    }

    public function add() {
        $kategori = $this->kategori->Select("*", "", "ORDER by id asc");
        $fasilitas = $this->fasilitas->Select("*", "")[1];
        $index = 0;
        $index = 0;
        $subfas = array();
        foreach($fasilitas as $f){
            $subfas[$index] = $f;
            $sub_fasilitas = $this->sub_fasilitas->Select("*", "WHERE id_fasilitas='$f[id]'")[1];
            $in = 0;
            $subfas[$index]['sub'][$in] = '';
            foreach($sub_fasilitas as $sub){
                $subfas[$index]['sub'][$in] = $sub;
                $subfas[$index]['old_sub'][$in] = null;
                $in++;
            }
            $index++;
        }
        
        // echo "<pre>";
        // print_r($subfas);
        // echo "</pre>";
        Response::render('back/index', ['title' => 'Tambah Kos', 'content' => 'kos/_form', 'type' => 'Tambah', 'subfas' => $subfas, 'data' => null, 'kategori' => $kategori[1]]);
    }

    public function edit($id) {
        $kategori = $this->kategori->Select("*", "", "ORDER by id asc");
        $fasilitas = $this->fasilitas->Select("*", "")[1];
        $index = 0;
        $index = 0;
        $subfas = array();
        foreach($fasilitas as $f){
            $subfas[$index] = $f;
            $sub_fasilitas = $this->sub_fasilitas->Select("*", "WHERE id_fasilitas='$f[id]'")[1];
            $in = 0;
            $subfas[$index]['sub'][$in] = '';
            foreach($sub_fasilitas as $sub){
                $subfas[$index]['sub'][$in] = $sub;
                $in++;
            }
            $inde = 0;
            $subfas[$index]['old_sub'][$inde] = '';
            $sf = $this->fasilitas_kos->select("sf.id", " fk JOIN sub_fasilitas sf ON fk.id_fasilitas=sf.id", "WHERE id_kos=$id and sf.id_fasilitas=$f[id]")[1];
            foreach ($sf as $sfv) {
                $subfas[$index]['old_sub'][$inde] = $sfv['id'];
                $inde++;
            }
            $index++;
        }
        
        
        $data = $this->kos->select("*", "WHERE id=$id")[1];
        // echo "<pre>";
        // print_r($subfas);
        // echo "</pre>";
        Response::render('back/index', ['title' => 'Edit Kos', 'content' => 'kos/_form', 'type' => 'Edit', 'data' => $data[0], 'subfas' => $subfas, 'kategori' => $kategori[1]]);
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
        $f = $_FILES;
        try {
            $arr = [
                'nama' => $d['nama'], 
                'deskripsi' => $d['deskripsi'], 
                'harga' => $d['harga'],
                'jumlah_kamar' => $d['jumlah_kamar'],
                'id_kategori' => $d['kategori'],
                'harga' => $d['harga'],
                'jenis' => $d['jenis'],
                'latitude' => $_COOKIE['lat'],
                'longitude' => $_COOKIE['long'],
                'harga' => $d['harga'],
                'ditambahkan_oleh' =>  Account::Get('id')
            ];
            $this->kos->Insert($arr);
            $id = $this->kos->lastInsertId();
            $this->kos->add_sub($id);
            // foreach ($d['sub_fasilitas'] as $v) {
            //     $array = [
            //         'id_fasilitas' => $v,
            //         'id_kos' => $this->kos->lastInsertId()
            //     ];
            //     $this->fasilitas_kos->insert($array);
            //     // print_r($array);
            // }

            Response::redirectWithAlert('admin/kost/', ['info', 'Kos berhasil ditambahkan']);
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

            Response::redirectWithAlert('admin/kost/', ['info', 'Kos berhasil diedit']);
        }
        catch(Exception $e) {

            $this->edit($id);
        }
    }

    public function delete($id) {
        $this->kos->delete("WHERE id='$id'");
        Response::redirectWithAlert('admin/kost/', ['info', "Berhasil menghapus akun"]);
    }

    public function detail($id){
        $data = $this->kos->Select("k.id, k.nama as nama_kos, k.dilihat,k.jenis, k.tanggal_diubah, k.latitude, k.longitude, k.deskripsi, k.jumlah_kamar, k.harga, k.tanggal_ditambahkan, p.nama", " k JOIN pengguna p ON k.ditambahkan_oleh=p.id", "WHERE k.id='$id'")[1][0];
        $media = $this->media->Select("*", "WHERE id_kos='$data[id]'")[1];
        // $fasilitas = $this->fasilitas_kos->Select("f.nama as fasilitas, sf.nama as sub_fasilitas, fk.", " fk JOIN sub_fasilitas sf ON fk.id_fasilitas=sf.id JOIN fasilitas f ON sf.id_fasilitas=f.id", "WHERE fk.id_kos='$data[id]'")[1];
        $ulasan = $this->ulasan->select("u.*, p.nama", "u JOIN pengguna p on u.id_pengguna=p.id", "WHERE id_kos=$id ")[1];   
        $this->kos->customQuery("update kos set dilihat = dilihat + 1 WHERE id='$id'");
        $fasilitas = $this->fasilitas_kos->select("f.id, f.nama","fk JOIN sub_fasilitas sf ON fk.id_fasilitas=sf.id JOIN fasilitas f ON sf.id_fasilitas=f.id", "WHERE id_kos='$data[id]' GROUP by f.id")[1];
        $index = 0;
        // echo "<pre>";
        $rate = $this->ulasan->select("*", "WHERE id_kos=$id")[1];
        $max = 0;
        foreach ($rate as $key) {
            $max+=$key['rating'];
        }
        $rate = $max / count($rate);
        $subfas = array();
        
        // echo "<pre>";
        // print_r($fasilitas);
        // echo "<br>Batasnya</br>";
        foreach($fasilitas as $f){
            $subfas[$index] = $f;
            $sub_fasilitas = $this->sub_fasilitas->Select("*", "WHERE id_fasilitas='$f[id]'")[1];
            $in = 0;
            foreach($sub_fasilitas as $sub){
                $subfas[$index]['sub'][$in] = $sub;
                $in++;
            }
            // print_r($sub_fasilitas);
            
            $index++;
        }
        // print_r($subfas);
        // echo "</pre>";

        Response::render('front/index', ['title' => $data['nama_kos'], 'content' => 'kos/detail', 'type' => 'Tambah', 'data' => $data, 'rate' => $rate, 'media' => $media, 'subfas' => $subfas, 'ulasan' => $ulasan]);
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
        $lat = $_COOKIE['lat'];
        $long = $_COOKIE['long'];
        // echo $_COOKIE['long'];
        // echo "<pre>";
        // print_r($d);
        // echo "</pre>";
        $urut = "";
        if (isset($d['jarak'])) {
            if($d['jarak'] != ''){
                $urut = " HAVING distance < $d[jarak] order by distance asc";    
            }
        }
        
        $pencarian = $urut;
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
            if (isset($d['urut'])) {
                if ($d['urut'] !='') {
                    $urut = "ORDER BY ";
                    if ($d['urut'] == 1) {
                        $urut .= " k.id desc";
                    }else if($d['urut'] == 2){
                        $urut .= " k.harga asc";
                    }else if($d['urut'] == 3){
                        $urut .= " k.harga desc";
                    }
                }
            }
            $harga = "";
            if(isset($d['harga_awal'])){
                if(($d['harga_awal'] !="" ) && ($d['harga_tertinggi'] != "")){
                    $harga = " AND k.harga BETWEEN '$d[harga_awal]' AND '$d[harga_tertinggi]'";
                }
            }
            $pencarian.=" $cari $kategori $tipe $harga";
            // SELECT *, ( 3959 * acos ( cos ( radians($key) ) * cos( radians( latitude) ) * cos( radians( longitude ) - radians($user) ) + sin ( radians($key) ) * sin( radians( latitude ) ) ) ) AS distance FROM outlet HAVING distance < 500 order by distance asc
            // 1 mile = 1,609 
            //key latitude and $user longitude
        }
        $long = $_COOKIE['long'];
        $lat    = $_COOKIE['lat'];
        // echo "$pencarian";
        $kos = $this->kos->Select("k.nama, k.id, k.deskripsi, k.tanggal_ditambahkan, p.nama as nama_pemilik, k.harga, m.link_media, ( 6371 * acos ( cos ( radians($lat) ) * cos( radians( latitude) ) * cos( radians( longitude ) - radians($lat) ) + sin ( radians($long) ) * sin( radians( latitude ) ) ) ) AS distance", 
        " k LEFT JOIN pengguna p on k.ditambahkan_oleh=p.id JOIN (Select * from media) m on k.id=m.id_kos", " $pencarian GROUP BY m.id_kos  $urut");
        
        $kategori = $this->kategori->Select("*", '')[1];
        Response::render('front/index', ['title' => 'Semua Kos', 'content' => 'kos/semua','data' => $kos[1], 'kategori' => $kategori]);
    }
    public function favorit($id){
        $count = $this->favorit->select("*", "WHERE id_kos=$id and id_pengguna=".Account::get('id'))[0];
        echo $count;
        if($count < 1){
            $this->favorit->insert(['id_kos' => $id, 'id_pengguna' => Account::get('id')]);
        }else{
            $this->favorit->delete("WHERE id_kos=$id and id_pengguna=".Account::get('id'));
        }
    }
    public function ulasan(){
        $d = $_POST;

        try {
            $arr = [
                'ulasan' => $d['ulasan'], 
                'id_pengguna' => Account::Get('id'), 
                'rating' => $d['rating'], 
                'id_kos' => $d['id_kos'], 
            ];

            $q = $this->ulasan->Insert($arr);
            // echo json_encode($arr);
            echo json_encode(['status' => true]);
            
        }
        catch(Exception $e) {
            // if($e->errorInfo[2] == "Duplicate entry '$d[email]' for key 'email'")
            //     $_SESSION['alert'] = ['danger', 'Email sudah terpakai'];
            print_r($e->errorInfo[2]);
            // $this->add();
        }
    }
    public function reviewExist($id){
        $d = $this->ulasan->select("k.nama, u.*", "u JOIN kos k on u.id_kos=k.id WHERE u.id_kos='$id' and u.id_pengguna=".Account::get('id')); 
        echo json_encode($d);
        // print_r($d);
        // echo "SELECT k.nama, u.* from ulasan u JOIN kos k on u.id_kos=k.id WHERE id_kos='36' and id_pengguna=1";
    }
    
}