<?php 
 
include 'koneksi.php';
$id = $_POST['id'];
$nama = $_POST['nama'];
$kode_fasilitas = $_POST['kode_fasilitas'];
 
mysqli_query($host, "UPDATE sub_fasilitas SET nama='$nama', kode_fasilitas='$kode_fasilitas' WHERE id='$id'");
 
header("location:index.php?pesan=update");
?>