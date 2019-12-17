
<a class="tombol" href="create.php">+ Tambah Data Baru</a>
 
	<h3>Data user</h3>
	<table border="1" class="table">
		<tr>
			<th>gambar</th>
			<th>KategoriKamar</th>
			<th>SisaKamar</th>
			<th>Harga</th>
			<th>NamaKos</th>		
        </tr>
        <?php 
		include "koneksi.php";
		$query_mysql = mysqli_query($host, "SELECT * FROM `create`")or die(mysql_error());
		$nomor = 1;
		while($data = mysqli_fetch_array($query_mysql)){
		?>
		<tr>
			
			<td><?php echo $data['gambar']; ?></td>
			<td><?php echo $data['KategoriKamar']; ?></td>
            <td><?php echo $data['SisaKamar']; ?></td>
            <td><?php echo number_format($data['Harga']); ?></td>
			<td><?php echo $data['NamaKos']; ?></td>
			<td>
				<a class="edit" href="update.php?id=<?php echo $data['id']; ?>">Edit</a> |
				<a class="hapus" href="delete.php?id=<?php echo $data['id']; ?>">Hapus</a>					
			</td>
		</tr>
		<?php } ?>
