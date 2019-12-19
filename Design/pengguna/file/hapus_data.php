<?php 
include 'tampil_data.php';
$id = $_GET['id'];
mysqli_query($host, "DELETE FROM pengguna WHERE id='$id'")or die(mysql_error());
 
header("location:tampil_data.php?pesan=hapus");
?>