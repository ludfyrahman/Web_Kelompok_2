<div class="page-content-wrapper-inner">
  <?php App::breadcrumb()?>
  <div class="content-viewport">
    <div class="row">
      
      <div class="col-lg-12">
        <div class="grid">
          <p class="grid-header"><?= $title ?>  </p>
          <?php Response::part('alert');?>
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
                    <td class='text-left'><?=$l['nama_kos']?></td>
                    <td class='text-left'><?=$l['status']?></td>
                    <td class='text-left'><?= App::Date($l['tanggal_pemesanan'])?></td>
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