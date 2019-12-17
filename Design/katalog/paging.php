<?php
include 'koneksi.php';
?>
 
<table border="1">
  <tr>
    <th>No</th>
    <th>Gambar</th> 
    <th>KategoriKamar</th>
    <th>SisaKamar</th>
    <th>Harga</th>
    <th>NamaKos</th>                        
  </tr>
  <?php 
  $halaman = 3;
  $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
  $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
  $result = mysqli_query($host,"SELECT * FROM `create`");
  $total = mysqli_num_rows($result);
  $pages = ceil($total/$halaman);            
  $query = mysqli_query($host, "select * from `create` LIMIT $mulai, $halaman")or die(mysql_error);
  $no =$mulai+1;
 
 
  while ($data = mysqli_fetch_assoc($query)) {
    ?>
    <tr>
      <td><?php echo $no++; ?></td>                  
      <td><?php echo $data['gambar']; ?></td>              
      <td><?php echo $data['KategoriKamar']; ?></td> 
      <td><?php echo $data['SisaKamar']; ?></td>
      <td><?php echo $data['Harga']; ?></td>
      <td><?php echo $data['NamaKos']; ?></td>
    </tr>
 
    <?php               
  } 
  ?>
  
 
</table>          
 
<div class="">
  <?php for ($i=1; $i<=$pages ; $i++){ ?>
  <a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
 
  <?php } ?>
 
</div>