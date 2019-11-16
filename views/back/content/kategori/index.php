<div class="page-content-wrapper-inner">
          <div class="viewport-header">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb has-arrow">
                <li class="breadcrumb-item">
                  <a href="#">Dashboard</a>
                </li>
                <!-- <li class="breadcrumb-item">
                  <a href="#">UI Elements</a>
                </li> -->
                <li class="breadcrumb-item active" aria-current="page">kategori</li>
              </ol>
            </nav>
          </div>
          <div class="content-viewport">
            <div class="row">
              
              <div class="col-lg-12">
                <div class="grid">
                  <p class="grid-header"><?= $title ?> <a href="<?=BASEADM."kategori/add"?>"><button class="btn btn-primary float-right">Tambah</button></a></p>
                  <?php Response::part('alert');?>
                  <div class="item-wrapper">
                    <div class="table-responsive">
                      <table class="table info-table table-striped">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th class='text-left'>Nama</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no = 1;
                          foreach($list as $l){
                          ?>
                          <tr>
                            <td><?=$no?></td>
                            <td class='text-left'><?=$l['nama']?></td>
                            <td>
                              <a href="<?=BASEADM.'kategori/'.$l['id'].'/edit' ?>" >
                                <i class="mdi mdi-pencil-box-outline"></i>
                              </a>
                              
                              <a href="<?=BASEADM.'kategori/'.$l['id'].'/delete' ?>" >
                                <i class="mdi mdi-delete-forever"></i>
                              </a>

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