<!DOCTYPE html>
<html>
<head>
	<title>Membuat CRUD Dengan PHP Dan MySQL - Menampilkan data dari database</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="judul">		
		<!-- Membuat CRUD Dengan PHP Dan MySQL</h1> -->
		<!-- Menampilkan data dari database</h2> -->
		<!-- www.malasngoding.com</h3> -->
	</div>
	
	<br/>
	
	<a href="index.php">Lihat Semua Data</a>
 
	<br/>
	<h3>Edit data</h3>
 
	<?php 
	include "koneksi.php";
	$id = $_GET['id'];
	$query_mysql = mysqli_query($host, "SELECT * FROM fasilitas WHERE id='$id'")or die(mysql_error());
	$nomor = 1;
	while($data = mysqli_fetch_array($query_mysql)){
	?>
	<form action="update.php" method="post">		
		<table>
			<tr>
				<td>id_kos</td>
				<td>
					<input type="text" name="id_kos" value="<?php echo $data['id'] ?>">
					<!-- <input type="text" name="nama" value="<?php echo $data['nama'] ?>"> -->
				</td>					
			</tr>	
			<tr>
				<td>nama</td>
				<td><input type="text" name="nama" value="<?php echo $data['nama'] ?>"></td>					
			</tr>	
			<tr>
				<td></td>
				<td><input type="submit" value="Simpan"></td>					
			</tr>				
		</table>
	</form>
	<?php } ?>
</body>
</html>