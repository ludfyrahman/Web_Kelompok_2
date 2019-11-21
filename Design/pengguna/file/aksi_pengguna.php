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
<?php 
		include '../koneksi.php';
		if($_POST['simpan']){
            $host = mysqli_connect("localhost","root","","papikos");

        if($host){
	            echo "koneksi host berhasil.<br/>";
            }else{
	            echo "koneksi gagal.<br/>";
            }
        }
?>
 
		
</html>