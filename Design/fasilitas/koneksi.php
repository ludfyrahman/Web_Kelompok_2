
<?php 
// isi nama host, username mysqli, dan password mysqli anda
$host = mysqli_connect("localhost","root","","papi_kos") ;
 
if($host){
	echo "koneksi host berhasil.<br/>";
}else{
	echo "koneksi gagal.<br/>";
}
// isikan dengan nama database yang akan di hubungkan
$db = mysqli_select_db($host, "papi_kos");
 
if($db){
	echo "koneksi database berhasil.";
}else{
	echo "koneksi database gagal.";
}
?>