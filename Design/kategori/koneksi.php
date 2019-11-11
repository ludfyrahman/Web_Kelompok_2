<?php 
// isi nama host, username mysql, dan password mysql anda
$host=mysqli_connect("localhost","root","","papikos");

if($host){
	echo "koneksi host berhasil.<br/>";
}else{
	echo "koneksi gagal.<br/>";
}
?>