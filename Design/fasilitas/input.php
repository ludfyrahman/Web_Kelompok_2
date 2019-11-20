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
	<h3>Input data baru</h3>
	<form action="input-aksi.php" method="post">		
		<table>
			<tr>
				<td>id_kos</td>
				<td><input type="text" name="id_kos"></td>					
			</tr>	
			<tr>
				<td>nama</td>
				<td><input type="text" name="nama"></td>										
</table>
<tr>
				<button type="submit" class="btn btn-info"> Simpan</button>					
			</tr>
	</form>
</body>
</html>