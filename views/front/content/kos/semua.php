<section id="blog" class="section blog-area ptb_100">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-3">
                <aside class="sidebar">
                    <!-- Single Widget -->
                    <div class="single-widget">
                        <!-- Search Widget -->
                        <div class="widget-content search-widget">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="">Nama Kos</label>
                                    <input type="text" placeholder="cari" name="cari" value="<?= Input::postOrOr('cari') ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Kategori Kos</label>
                                    <select name="tipe" id="" class="form-control">
                                        <option value="">Semua</option>
                                    <?php
                                    $tp = Input::postOrOr('tipe');
                                    foreach ($kategori as $k) {
                                    ?>
                                        <option value="<?= $k['id'] ?>" <?= ($tp == $k['id'] ? 'selected' : '') ?>><?= $k['nama'] ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Tipe Kos</label>
                                    <?php
                                    $tp = Input::postOrOr('tipe');
                                    ?>
                                    <select name="tipe" id="" class="form-control">
                                        <option value="">Semua</option>
                                        <option value="1" <?= $tp == "1" ? 'selected' : '' ?>>Laki-Laki</option>
                                        <option value="2" <?= $tp == "2" ? 'selected' : '' ?>>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Urutkan</label>
                                    <select name="urut" id="" class="form-control">
                                        <option value="">Semua</option>
                                        <option value="1">Terbaru</option>
                                        <option value="2">Termurah</option>
                                        <option value="3">Tertinggi</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Rentang Harga</label>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <input type="text" placeholder="harga awal" name="harga_awal" class="form-control" value="<?= Input::postOrOr('harga_awal') ?>">
                                        </div>
                                        <div class="col-md-1">
                                            -
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" placeholder="harga tertinggi" name="harga_tertinggi" value="<?= Input::postOrOr('harga_tertinggi') ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="search" class="btn btn-success btn-block">Cari</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </aside>
            </div>
            <div class="col-12 col-lg-9">
                <div class="row">
                <?php 
                foreach ($data as $k) {
                    // $link = BASEURL."kos/detail/".
                ?>
                <div class="col-12 col-md-6 col-lg-4"  style="margin-top:20px;">
                    <!-- Single Blog -->
                    <div class="single-blog wow fadeIn res-margin" data-wow-duration="2s">
                        <!-- Blog Thumb -->
                        <div class="blog-thumb">
                            <!-- <a href="#"><img style="height:200px" src="<?=BASEASSET?>/images/upload/kos/<?= $k['link_media'] ?>" alt=""></a> -->
                        </div>
                        <!-- Blog Content -->
                        <div class="blog-content p-4">
                            <!-- Meta Info -->
                            <ul class="meta-info d-flex justify-content-between">
                                <li>By <a href="<?= BASEURL."kos/detail/".$k['id'] ?>"><?= $k['nama_pemilik'] ?></a></li>
                                <li><a href="<?= BASEURL."kos/detail/".$k['id'] ?>"><?= App::Date($k['tanggal_ditambahkan'], 'd M Y') ?></a></li>
                            </ul>
                            <!-- Blog Title -->
                            <h3 class="blog-title my-3"><a href="#"><?= substr($k['nama'], 0,15)."..." ?></a></h3>
                            <p><?= substr($k['deskripsi'], 0, 30)."..." ?></p>
                            <p><?= App::price($k['harga']) ?></p>
                            <a href="<?= BASEURL."kos/detail/".$k['id'] ?>" class="blog-btn mt-3">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Blog Area End ***** -->