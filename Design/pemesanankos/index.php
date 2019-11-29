<!DOCTYPE html>
<html>
<head>
	<!-- <title>Membuat CRUD Dengan PHP Dan MySQL - Menampilkan data dari database</title> -->
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="judul">		
		<!-- Membuat CRUD Dengan PHP Dan MySQL</h1> -->
		<!-- Menampilkan data dari database</h2> -->
		<!-- www.malasngoding.com</h3> -->
	</div>
	<br/>
 
	<?php 
	if(isset($_GET['pesan'])){
		$pesan = $_GET['pesan'];
		if($pesan == "input"){
			echo "Data berhasil di input.";
		}else if($pesan == "update"){
			echo "Data berhasil di update.";
		}else if($pesan == "hapus"){
			echo "Data berhasil di hapus.";
		}
	}
	?>
	<br/>
	<a class="tombol" href="input.php">+ Tambah Data Baru</a>
 
	<h3>Data user</h3>
	<table border="1" class="table">
		<tr>
		<th>No</th>
			<th>id_pengguna</th>
			<th>id_kos</th>
            <th>tanggal_pemesanan</th>
			<th>status</th>	
			<th>kode_pemesanan</th>		
		</tr>
		<?php 
		include "koneksi.php";
		$query_mysql = mysqli_query($host, "SELECT * FROM pemesanan")or die(mysql_error());
		$nomor = 1;
		while($data = mysqli_fetch_array($query_mysql)){
		?>
		<tr>
			<td><?php echo $nomor++; ?></td>
			<td><?php echo $data['id_pengguna']; ?></td>
			<td><?php echo $data['id_kos']; ?></td>
			<td><?php echo $data['tanggal_pemesanan']; ?></td>
			<td><?php echo $data['status']; ?></td>
			<td><?php echo $data['kode_pemesanan']; ?></td>
			<td>
				<a class="hapus" href="hapus.php?id=<?php echo $data['kode_pemesanan']; ?>">Hapus</a>					
			</td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>