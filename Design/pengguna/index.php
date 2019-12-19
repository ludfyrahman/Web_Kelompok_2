<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <!--<link rel="stylesheet" href="index.css">-->

    <title>PAPI KOS</title>
</head>

<body>
<form action="aksi.php" method="post" enctype="multipart/form-data">
    <div style="margin-top: 10px">
        <h2 style="text-align: center">Pemesanan Kos</h2>
    </div>
    <div class="container-fluid">
        <a href="#" style="background-color: rgb(113, 238, 186); border: 1px solid rgb(113, 238, 186)"class="btn btn-primary btn-lg active" role="button" aria-pressed="true">kembali</a>
        <br>
        <br>
        <p>Mochammad Ludfi Rahman</p>
        <p>082331759738</p>
    </div>
    <div style="border: 1px solid black; height: 200px; width: 700px; margin: auto; text-align: center;">
		<input type="file" name="file" id="imgInp">
		<img src="" id="blah" style="width:50%;height:120px" alt="">
        <p style="margin-top: 10%" id="textID">unggah bukti pembayaran</p>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 kiri">
                <p style="margin-top: 10px">Pembayaran Melalui Rekening</p>
                <h4>- Bank BNI Papikos 2889389829829</h4>
            </div>
            <div class="col-md-6 kanan" style="text-align: center">
                <br>
                <p style="text-align: left">Batas Maksimal Pelunasan 3 hari setelah Melakukan DP</p>
                <!-- <a href="#" style="background-color: rgb(113, 238, 186); border: 1px solid rgb(113, 238, 186)"class="btn btn-primary btn-lg active float-center" role="button" aria-pressed="true">Kirim
                    Bukti</a> -->
                    <input type="submit" name="upload" value="Upload" style="background-color: rgb(113, 238, 186); border: 1px solid rgb(113, 238, 186)"class="btn btn-primary btn-lg active float-center">
                    
            </div>
        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
      $("#textID").hide();
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
});
    </script>
    </body>
    </html>