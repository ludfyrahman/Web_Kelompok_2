<?php 
include 'koneksi.php';
$nama = $_POST['nama'];
$kode_fasilitas = $_POST['kode_fasilitas'];
 
mysqli_query($host, "INSERT INTO sub_fasilitas VALUES('','$nama', '$kode_fasilitas')");
 
header("location:index.php?pesan=input");
?>