<!DOCTYPE html>
<html>
<head>
	<title>Membuat CRUD Dengan PHP Dan MySQL - Menampilkan data dari database</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	
	<br/>
 
	<a href="tampil_data.php">Lihat Semua Data</a>
 
	<br/>
	<h3>Input data baru</h3>
	<form action="input-aksi.php" method="post">		
		<table>
			<tr>
				<td>Nama Pengguna</td>
				<td><input type="text" name="nama_pengguna"></td>					
			</tr>	
			<tr>
				<td>Level</td>
				<td><input type="text" name="level"></td>					
			</tr>	
			<tr>
				<td>Tanggal Ditambahkan</td>
				<td><input type="text" name="tanggal_ditambahkan"></td>					
			</tr>
			<tr>
				<td>No KTP</td>
				<td><input type="text" name="no_ktp"></td>					
			</tr>	
			<tr>
				<td>Alamat</td>
				<td><input type="text" name="alamat"></td>					
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td><input type="text" name="jenis_kelamin"></td>					
			</tr>
			<tr>
				<td>Telepon</td>
				<td><input type="text" name="telepon"></td>					
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email"></td>					
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="text" name="password"></td>					
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Simpan"></td>					
			</tr>				
		</table>
	</form>
</body>
</html>