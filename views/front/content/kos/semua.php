<section id="blog" class="section blog-area ptb_100">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-3">
                <aside class="sidebar">
                    <!-- Single Widget -->
                    <div class="single-widget">
                        <!-- Search Widget -->
                        <div class="widget-content search-widget">
                            <form action="#">
                                <div class="form-group">
                                    <label for="">Nama Kos</label>
                                    <input type="text" placeholder="cari">
                                </div>
                                <div class="form-group">
                                    <label for="">Kategori Kos</label>
                                    <input type="text" placeholder="cari">
                                </div>
                                <div class="form-group">
                                    <label for="">Tipe Kos</label>
                                    <select name="tipe" id="" class="form-control">
                                        <option value="">Semua</option>
                                        <option value="1">Laki-Laki</option>
                                        <option value="2">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Urutkan</label>
                                    <select name="order" id="" class="form-control">
                                        <option value="">Semua</option>
                                        <option value="1">Rekomendasi</option>
                                        <option value="2">Termurah</option>
                                        <option value="2">Tertinggi</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Rentang Harga</label>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <input type="text" placeholder="harga awal" class="form-control" >
                                        </div>
                                        <div class="col-md-1">
                                            -
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" placeholder="harga tertinggi" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-block">Cari</button>
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
                <div class="col-12 col-md-6 col-lg-4">
                    <!-- Single Blog -->
                    <div class="single-blog wow fadeIn res-margin" data-wow-duration="2s">
                        <!-- Blog Thumb -->
                        <div class="blog-thumb">
                            <a href="#"><img src="<?=BASEASSET?>/images/upload/kos/<?= $k['link_media'] ?>" alt=""></a>
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