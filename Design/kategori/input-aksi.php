<?php 
include 'koneksi.php';
$nama_kategori = $_POST['nama_kategori'];
$tanggal_ditambahkan = $_POST['tanggal_ditambahkan'];
 
mysqli_query($host, "INSERT INTO kategori VALUES('','$tanggal_ditambahkan', '$nama_kategori')");
 
header("location:index.php?pesan=input");
?>