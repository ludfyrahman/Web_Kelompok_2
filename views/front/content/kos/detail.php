<!-- ***** Blog Area Start ***** -->
<section id="blog" class="section blog-area ptb_100">
    <div class="container">
        <div class="row">
            
            <div class="col-12 col-lg-12">
                <!-- Single Blog Details -->
                <article class="single-blog-details">
                    <!-- Blog Thumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Library</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data</li>
                        </ol>
                    </nav>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="blog-thumb">
                                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <?php
                                        $no = 1;
                                    foreach($media as $m){
                                        ?>
                                        <div class="carousel-item <?= ($no == 1 ? 'active' : '')?>">
                                            <img src="<?= BASEASSET."images/upload/kos/".$m['link_media'] ?>" class="d-block w-100" alt="...">
                                        </div>
                                        <?php $no++;} ?>
                                    </div>
                                </div>
                            </div>
                            <div class="slider-image margin-18">
                                <?php
                                    $no = 1;
                                    foreach($media as $m){
                                ?>
                                    <div class="image-slide">
                                        <img src="<?= BASEASSET."images/upload/kos/".$m['link_media'] ?>" class="" alt="...">
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="blog-content appo-blog">
                                <!-- Meta Info -->
                                <!-- Blog Details -->
                                <div class="blog-details">
                                    <h3 class="color-primary float-right"><?=App::price($data['harga'])?> / Bulan</h3>
                                    <h3 class="blog-title py-2 py-sm-3 inline"><?= $data['nama_kos'] ?></h3>
                                    <h5 class="margin-top-bottom-12">Tersedia <?= $data['jumlah_kamar']?> kamar</h5>
                                    <div class="meta-info d-flex flex-wrap align-items-center py-2">
                                        <ul>
                                            <li class="d-inline-block p-2">Pemilik Kos <?= $data['nama'] ?></li>
                                            <li class="d-inline-block p-2">Diubah <?= App::date($data['tanggal_diubah'], "d M Y, H:i") ?></li>
                                            <li class="d-inline-block p-2"><a href="#">2 Comments</a></li>
                                        </ul>
                                        <!-- <div class="blog-share ml-auto d-none d-sm-block">
                                            <div class="social-icons d-flex justify-content-center">
                                                <a class="bg-white facebook" href="#">
                                                    <i class="fab fa-facebook-f"></i>
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                                <a class="bg-white twitter" href="#">
                                                    <i class="fab fa-twitter"></i>
                                                    <i class="fab fa-twitter"></i>
                                                </a>
                                                <a class="bg-white google-plus" href="#">
                                                    <i class="fab fa-google-plus-g"></i>
                                                    <i class="fab fa-google-plus-g"></i>
                                                </a>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="rating padding12">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="col-md-2">
                                                <p>O ulasan</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row margin-12">
                                        <div class="col-md-2">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <i class="fa fa-eye"></i>
                                                </div>
                                                <div class="col-md-6 text-center">
                                                    Dilihat
                                                    <p>20</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <i class="fa fa-eye"></i>
                                                </div>
                                                <div class="col-md-6 text-center">
                                                    Dilihat
                                                    <p>20</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <i class="fa fa-eye"></i>
                                                </div>
                                                <div class="col-md-6 text-center">
                                                    Dilihat
                                                    <p>20</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <i class="fa fa-eye"></i>
                                                </div>
                                                <div class="col-md-6 text-center">
                                                    Dilihat
                                                    <p>20</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="<?= BASEURL."kos/pesan/".$data['id']?>"><button class="btn btn-success float-right">Pesan</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="informasi-tab" data-toggle="tab" href="#informasi" role="tab" aria-controls="informasi" aria-selected="true"><i class="fa fa-clipboard-list"></i>  Informasi Kos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="ulasan-tab" data-toggle="tab" href="#ulasan" role="tab" aria-controls="ulasan" aria-selected="false"><i class="fa fa-swatchbook"></i> Ulasan</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="informasi" role="tabpanel" aria-labelledby="informasi-tab">
                                    <div class="container">
                                        <h4 class="margin-top-bottom-12">Deskripsi Kos</h4>
                                        <p class="d-none d-sm-block text-justify"><?= $data['deskripsi'] ?></p>
                                        <?php 
                                        foreach ($subfas as $sf) {
                                        ?>
                                        <h5 class="margin-top-bottom-12"><?= $sf['nama'] ?></h5>
                                        <div class="row">
                                        <?php 
                                        foreach ($sf['sub'] as $sub) {
                                            ?>
                                            <div class="col-md-2">
                                                <i class="fa fa-book"></i> <?= $sub['nama'] ?>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <?php } ?>
                                        <h4 class="margin-top-bottom-12">Lokasi Kos</h4>
                                        <div style="clear:both"></div>
                                        <div id="map">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="ulasan" role="tabpanel" aria-labelledby="ulasan-tab">...</div>
                            </div>
                        </div>
                    </div>
                    <!-- Blog Content -->
                </article>
            </div>
        </div>
    </div>
</section>
<!-- ***** Blog Area End ***** -->