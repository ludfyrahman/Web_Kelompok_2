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
                    <div class="row">
                        <div class="col-md-4">
                            <div class="" >
                                <div>
                                    <img src="<?= BASEASSET."images/avatar/avatar-3.png" ?>" alt="" class="img-fluid">
                                </div>
                                <div class="card-body">
                                    <a href="#" class="btn  btn-block btn-sm">Ubah Password</a>
                                    <a href="#" class="btn  btn-block btn-sm">Edit Profile</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h5 class="margin-top-bottom-12">Ubah Biodata Diri</h5>
                            <div class="margin-top-bottom-12">
                                <label for="" class='col-4'>Nama</label>
                                <span class="col-d"><?= Account::Get("nama") ?></span>
                                <a href="" class="color-primary">Ubah</a>
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
                                <span class="badge badge-success"><i class="fa fa-check"></i> Terverifikasi</span>
                                <a href="" class="color-primary">Ubah</a>
                            </div>
                            <div class="margin-top-bottom-12">
                                <label for="" class='col-4'>Email</label>
                                <span class="col-4"><?= Account::Get("email") ?></span>
                                <span class="badge badge-success"><i class="fa fa-check"></i> Terverifikasi</span>
                                <a href="" class="color-primary">Ubah</a>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
<!-- ***** Blog Area End ***** -->