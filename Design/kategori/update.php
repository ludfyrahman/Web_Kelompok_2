<?php 
 
include 'koneksi.php';
$id = $_POST['id'];
$nama_kategori = $_POST['nama_kategori'];
$tanggal_ditambahkan = $_POST['tanggal_ditambahkan'];
 
mysqli_query($host, "UPDATE kategori SET nama_kategori='$nama_kategori', tanggal_ditambahkan='$tanggal_ditambahkan' WHERE id='$id'");
 
header("location:index.php?pesan=update");
?>