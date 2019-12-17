<?php 
 
include 'koneksi.php';
$id = $_POST['id'];
$Gambar = $_POST['Gambar'];
$KategoriKamar = $_POST['KategoriKamar'];
$SisaKamar = $_POST['SisaKamar'];
$Harga = $_POST['Harga'];
$NamaKos = $_POST['NamaKos'];
mysqli_query($host, "UPDATE `create` SET Gambar='$Gambar', KategoriKamar='$KategoriKamar', SisaKamar='$SisaKamar',Harga='$Harga', NamaKos='$NamaKos'WHERE id='$id'");
 
header("location:index.php?pesan=update");
?>