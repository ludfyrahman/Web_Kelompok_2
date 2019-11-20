<?php 
 
include 'koneksi.php';
$id_kos = $_POST['id_kos'];
$nama = $_POST['nama'];
  
mysqli_query($host, "UPDATE fasilitas SET nama='$nama' WHERE id='$id_kos'");
 
header("location:index.php?pesan=update");
?>