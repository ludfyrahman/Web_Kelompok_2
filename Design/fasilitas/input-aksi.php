<?php 
include 'koneksi.php';
$nama = $_POST['nama'];
 
// echo $nama;
mysqli_query($host, "INSERT INTO fasilitas VALUES('', '$nama')");
 
header("location:input.php?pesan=input");
?>