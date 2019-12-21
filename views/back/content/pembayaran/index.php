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
                    <th class='text-left'>Tipe Pembayaran</th>
                    <th class='text-left'>Tanggal Pemesanan</th>
                    <!-- <th></th> -->
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
                    <td class='text-left'><?=tipe_pembayaran[$l['tipe']]?></td>
                    <td class='text-left'><?= App::Date($l['tanggal_pembayaran'])?></td>
                    <!-- <td>
                      <a href="<?=BASEADM.'pengguna/'.$l['id'].'/edit' ?>" >
                        <i class="mdi mdi-pencil-box-outline"></i>
                      </a>
                      
                      <a href="<?=BASEADM.'pengguna/'.$l['id'].'/delete' ?>" >
                        <i class="mdi mdi-delete-forever"></i>
                      </a>

                    </td> -->
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