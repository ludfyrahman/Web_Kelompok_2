<?php 
include 'koneksi.php';
$id = $_GET['id'];
mysqli_query($host, "DELETE FROM kategori WHERE id='$id'")or die(mysql_error());
 
header("location:index.php?pesan=hapus");
?>