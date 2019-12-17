<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <title>Catalog</title>
</head>

    <body>
	<?php 
	include "koneksi.php";
	$id = $_GET['id'];
	$query_mysql = mysqli_query($host, "SELECT * FROM `create` WHERE id='$id'")or die(mysql_error());
	$nomor = 1;
	while($data = mysqli_fetch_array($query_mysql)){ 
	?>

    <form action="updateAksi.php" method="post">
<div class="container" style="margin-top: 25px">
  <div  class="form-row">
  <div class="form-group col-md-12">
    <label for="exampleFormControlFile1">Gambar</label>
    <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
    <input type="file" style="padding:4px" class="form-control" name="Gambar" placeholder="masukan gambar">
  </div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="input">Kategori Kamar</label>
      <input type="text" class="form-control" name="KategoriKamar" placeholder="putra/putri">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">sisa kamar</label>
      <input type="number" class="form-control" name="SisaKamar" placeholder="sisa kamar">
    </div>
    <div class="form-group col-md-4">
      <label for="inputZip">harga</label>
      <input type="number" class="form-control" name="Harga" placeholder="harga">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="input">Nama Kos</label>
      <input type="text" class="form-control" name="NamaKos" placeholder="NamaKos">
    </div>

  <div class="form-group col-md-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        apakah sudah valid ?
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">update</button>
</form>
</nav>



    </body>
</html>
<?php
    }
?>