<?php 
include 'koneksi.php';
$Gambar = $_POST['Gambar'];
$KategoriKamar = $_POST['KategoriKamar'];
$SisaKamar = $_POST['SisaKamar'];
$Harga = $_POST['Harga'];
$NamaKos = $_POST['NamaKos'];
 
mysqli_query($host,"INSERT INTO `create` VALUES('$Gambar','$KategoriKamar','$SisaKamar','$Harga','$NamaKos','')");
 
header("location:index.php?pesan=input");