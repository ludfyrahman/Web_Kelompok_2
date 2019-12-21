<div class="page-content-wrapper-inner">
  <?php App::breadcrumb()?>
  <div class="content-viewport">
    <div class="row">
      
      <div class="col-lg-12">
        <div class="grid">
          <p class="grid-header"><?= $title ?>  </p>
          <?php Response::part('alert');?>
          <form action="" method="post">
            <div class="row">
              <div class="form-group col-md-3">
                <input type="date" name="start_date" class="form-control" placeholder="Tanggal Awal">
              </div>
              <div class="col-md-1">
                sampai
              </div>
              <div class="form-group col-md-3">
                <input type="date" name="end_date" class="form-control" placeholder="Tanggal Akhir">
              </div>
              <div class="col-md-2">
                <input type="submit" class="btn btn-primary btn-sm" name="cari" value="Filter">
              </div>
              <div class="col-md-3">
                <!-- <button class="btn btn-success"><i class="mdi mdi-file-excel"></i></button>
                <button class="btn btn-danger"><i class="mdi mdi-file-pdf"></i></button> -->
              </div>
            </div>
          </form>
          <div class="item-wrapper">
            <div class="table-responsive">
              <table class="table info-table table-striped">
                <thead>
                  <tr>
                    <th>Kode Pemesanan</th>
                    <th class='text-left'>Nama Pemesan</th>
                    <th class='text-left'>Nama Kos</th>
                    <th class='text-left'>Status</th>
                    <th class='text-left'>Tanggal Pemesanan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach($list as $l){
                  ?>
                  <tr>
                    <td><?=$no?></td>
                    <td class='text-left'><?=$l['nama_pemesan']?></td>
                    <td class='text-left'><?=$l['nama_kos']?></td>
                    <td class='text-left'><?=$l['status']?></td>
                    <td class='text-left'><?= App::Date($l['tanggal_pemesanan'])?></td>
                    <td>
                    <?php 
                    if($l['status_code'] == 1){
                    ?>
                    <a href="<?=BASEADM.'pemesanan/aksi/'.$l['status_code'].'/'.$l['id'] ?>" >
                      <button class="btn btn-primary btn-sm">Terima</button>
                    </a>
                    <a href="<?=BASEADM.'pemesanan/aksi/'.$l['status_code'].'/'.$l['id'] ?>" >
                      <button class="btn btn-danger btn-sm">Tolak</button>
                    </a>
                    <?php } ?>  
                    </td>
                  </tr>
                <?php $no++;} ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>