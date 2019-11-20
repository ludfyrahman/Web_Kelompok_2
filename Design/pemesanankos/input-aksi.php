<?php 
include 'koneksi.php';
$tanggal_pemesanan = $_POST['tanggal_pemesanan'];
$status = $_POST['status'];
$kode_pemesanan = $_POST['kode_pemesanan'];
 
mysqli_query($host, "INSERT INTO pemesanan VALUES('','', '$tanggal_pemesanan', '$status', '$kode_pemesanan')");
 
// header("location:input.php?pesan=input");
?>