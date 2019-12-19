<!DOCTYPE html>
<html>
<head>
	<!-- Membuat CRUD Dengan PHP Dan MySQL - Menampilkan data dari database-->
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
	<h3>Input Pemesanan Baru</h3>
	<form action="input-aksi.php" method="post">		
		<table>
			<tr>
				<td>Tanggal Pemesanan</td>
				<td><input type="date" name="tanggal_pemesanan"></td>					
			</tr>	
			<tr>
				<td>Status</td>
				<td><input type="text" name="status"></td>						
			<tr>
				<td>Kode Pemesanan</td>
				<td><input type="text" name="kode_pemesanan"></td>	
        </div>				
			</tr>				
		</table>
		<button type= "submit" class="btn btn-info">Simpan</button>
	</form>
	<div>
</body>
</html>