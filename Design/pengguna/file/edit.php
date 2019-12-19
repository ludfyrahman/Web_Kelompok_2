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
	<h3>Edit data</h3>
 
	<?php 
	include "../koneksi.php";
	$id = $_GET['id'];
	$query_mysql = mysqli_query($host, "SELECT * FROM pengguna WHERE id='$id'")or die(mysql_error());
	$nomor = 1;
	while($data = mysqli_fetch_array($query_mysql)){
	?>
	<form action="update.php" method="post">		
		<table>
			<tr>
				<td>Nama</td>
				<td>
					<input type="hidden" name="id" value="<?php echo $data['id'] ?>">
					<input type="text" name="nama_pengguna" value="<?php echo $data['nama_pengguna'] ?>">
				</td>					
			</tr>	
			<tr>
				<td>Level</td>
				<td><input type="text" name="level" value="<?php echo $data['level'] ?>"></td>					
			</tr>	
			<tr>
				<td>Tanggal Ditambahkan</td>
				<td><input type="text" name="tanggal_ditambahkan" value="<?php echo $data['tanggal_ditambahkan'] ?>"></td>					
			</tr>	
			<tr>
				<td>No KTP</td>
				<td><input type="text" name="no_ktp" value="<?php echo $data['no_ktp'] ?>"></td>					
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $data['email'] ?>"></td>					
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="text" name="password" value="<?php echo $data['password'] ?>"></td>					
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