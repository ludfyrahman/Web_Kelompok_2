<?php 
include '../koneksi.php';
$nama_pengguna = $_POST['nama_pengguna'];
$level = $_POST['level'];
$Tanggal_ditambahkan = $_POST['tanggal_ditambahkan'];
$password = $_POST['password'];
$noktp = $_POST['no_ktp'];
$email = $_POST['email'];

 
mysqli_query($host, "INSERT INTO pengguna VALUES('','$nama_pengguna','$level','$Tanggal_ditambahkan','$password','$noktp','$email')");
 
 header("location:tampil_data.php?pesan=input");
?>