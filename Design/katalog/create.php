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
    <form action="createAksi.php" method="post">
<div class="container" style="margin-top: 25px">
  <div  class="form-row">
  <div class="form-group col-md-12">
    <label for="exampleFormControlFile1">Gambar</label>
    <!-- <input type="file" style="padding:4px" class="form-control" name="Gambar" placeholder="masukan gambar"> -->
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                            <form runat="server">
                            <input style="margin-above:20px" type='file'  id="imgInp" />
                            <form style="float:right; width:40px; height:530px; margin-right:60px">
                            </form>
                                <img id="blah" src="#" alt="your image" />
                                </div>
                                
                                <script>
                        function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
});
                        </script>
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
        pakah sudah valid ?
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">simpan</button>
</form>
</nav>



    </body>
</html>
