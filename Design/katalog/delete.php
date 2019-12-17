<?php 
include 'koneksi.php';
$id = $_GET['id']; //menghapsusya berdasrkan id
mysqli_query($host, "DELETE FROM `create` WHERE id='$id'")or die(mysql_error());
 
header("location:index.php?pesan=hapus");
?>