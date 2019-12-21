<!-- ***** Blog Area Start ***** -->
<section id="blog" class="section blog-area ptb_100">
    <div class="container">
        <div class="row">
            <?php
            Response::part('sidebar_profile');
            ?>
            <div class="col-12 col-lg-9">
                <!-- Single Blog Details -->
                <article class="single-blog-details ">
                <?php Response::part('alert'); ?>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="" >
                                <div>
                                    <img src="<?= BASEASSET."images/upload/profil/".Account::get("profil") ?>" alt="" class="img-fluid" style="width:100%">
                                </div>
                                <div class="card-body">
                                    <a href="#"class="btn btn-block btn-sm" data-toggle="modal" data-target="#ubah_password">Ubah Kata Sandi</a>
                                    <a href="#" class="btn btn-block btn-sm" >Edit Profil</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h5 class="margin-top-bottom-12">Ubah Biodata Diri</h5>
                            <div class="margin-top-bottom-12">
                                <label for="" class='col-4'>Nama</label>
                                <span class="col-d"><?= Account::Get("nama") ?></span>
                            </div>
                            <div class="margin-top-bottom-12">
                                <label for="" class='col-4'>Tanggal Lahir</label>
                                <span class="col-d"><?= App::Date(Account::Get("tanggal_lahir"), 'd M Y') ?></span>
                            </div>
                            <div class="margin-top-bottom-12">
                                <label for="" class='col-4'>Jenis Kelamin</label>
                                <span class="col-d"><?= jenis_kelamin[Account::Get("jenis_kelamin")] ?></span>
                            </div>
                            <h5 class="margin-top-bottom-12">Ubah Kontak</h5>
                            <div class="margin-top-bottom-12">
                                <label for="" class='col-4'>No Hp</label>
                                <span class="col-4"><?= Account::Get("no_hp") ?></span>
                                <span class="badge <?= (Account::get("stnohp") == 1 ? 'badge-success' : 'badge-warning') ?>"><i class="fa fa-check"></i> <?= (Account::get("stnohp") == 1 ? 'Terverifikasi' : 'tidak Terverifikasi') ?></span>
                                <a href="#" class="color-primary"  data-toggle="modal" data-target="#no_hp">Ubah</a>
                            </div>
                            <div class="margin-top-bottom-12">
                                <label for="" class='col-4'>Email</label>
                                <span class="col-4"><?= Account::Get("email") ?></span>
                                <span class="badge <?= (Account::get("stemail") == 1 ? 'badge-success' : 'badge-warning') ?>"><i class="fa fa-check"></i> <?= (Account::get("stemail") == 1 ? 'Terverifikasi' : 'tidak Terverifikasi') ?></span>
                                <a href="#" class="color-primary" data-toggle="modal" data-target="#email">Ubah</a>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
<!-- modal -->

<!-- ubah password -->
<div class="modal fade" id="ubah_password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Kata Sandi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= BASEURL."pengguna/profil/proses_password" ?>" method="POST" >
        <div class="modal-body">
            <div class="form-group">
                <label for="">Kata Sandi Lama</label>
                <input type="password" name="old_password" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Kata Sandi Baru</label>
                <input type="password" name="new_password" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Ulangi Kata Sandi Baru</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success">Ubah</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- verifikasi email -->
<div class="modal fade" id="email" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Verifikasi Email</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <a href="#">
                <div class="single-blog wow fadeIn res-margin" data-wow-duration="2s">
                    <div class="blog-content p-4" id="verifikasi_email">
                        <i class="fa fa-envelope text-success"></i>  <?= Account::get('email') ?>
                    </div>
                </div>
            </a>
        </div>
    </div>
  </div>
</div>
<div class="modal fade" id="code_email" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Masukkan Kode Verifikasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= BASEURL."pengguna/profil/proses_password" ?>" method="POST" >
      
        <div class="modal-body text-center">
            <p >Kode verifikasi yang telah dikirimkan ke email <?= Account::get("email") ?></p>
            <div class="form-group">
                <h3 for="" style="margin:20px">Kode verifikasi</h3>
                <input type="text" name="verification_code" class="form-control">
            </div>
            <p>Tidak menerima Kode ?</p>
            <p class="text-success">Kirim Ulang</p>
            <button type="submit" class="btn btn-success btn-block">Ubah</button>
        </div>
    </form>
    </div>
  </div>
</div>
<!-- verifikasi no hp -->
<div class="modal fade" id="no_hp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Verifikasi No HP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <a href="#">
                <div class="single-blog wow fadeIn res-margin" data-wow-duration="2s">
                    <div class="blog-content p-4" id="verifikasi_no_hp">
                        <i class="fa fa-envelope text-success"></i>  <?= Account::get('no_hp') ?>
                    </div>
                </div>
            </a>
        </div>
    </div>
  </div>
</div>
<div class="modal fade" id="code_no_hp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Masukkan Kode Verifikasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= BASEURL."pengguna/profil/proses_password" ?>" method="POST" >
      
        <div class="modal-body text-center">
            <p >Kode verifikasi yang telah dikirimkan ke No HP <?= Account::get("no_hp") ?></p>
            <div class="form-group">
                <h3 for="" style="margin:20px">Kode verifikasi</h3>
                <input type="text" name="verification_code" class="form-control">
            </div>
            <p>Tidak menerima Kode ?</p>
            <p class="text-success">Kirim Ulang</p>
            <button type="submit" class="btn btn-success btn-block">Ubah</button>
        </div>
    </form>
    </div>
  </div>
</div>
<!-- ubah no hp -->
<div class="modal fade" id="ubah_password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Kata Sandi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= BASEURL."pengguna/profil/proses_password" ?>" method="POST" >
        <div class="modal-body">
            <div class="form-group">
                <label for="">Kata Sandi Lama</label>
                <input type="password" name="old_password" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Kata Sandi Baru</label>
                <input type="password" name="new_password" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Ulangi Kata Sandi Baru</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success">Ubah</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- ***** Blog Area End ***** -->