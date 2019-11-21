<?php 
 
include '../koneksi.php';
$nama_pengguna = $_POST['nama_pengguna'];
$level = $_POST['level'];
$Tanggal_ditambahkan = $_POST['tanggal_ditambahkan'];
$password = $_POST['password'];
$noktp = $_POST['no_ktp'];
$email = $_POST['email'];
$id = $_POST['id'];
mysqli_query($host, "UPDATE pengguna SET nama_pengguna='$nama_pengguna', level='$level', Tanggal_ditambahkan='$Tanggal_ditambahkan', password='$password', no_ktp='$noktp', email='$email'  WHERE id='$id'");
 
header("location:index_data.php?pesan=update");
?>