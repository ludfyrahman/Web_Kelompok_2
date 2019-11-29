<!-- ***** Blog Area Start ***** -->
<section id="blog" class="section blog-area ptb_100">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-3">
                <aside class="sidebar">
                    
                    <div class="single-widget">
                        <!-- Category Widget -->
                        <div class="accordions widget catagory-widget" id="cat-accordion">
                            <div class="single-accordion blog-accordion">
                                <h5>
                                    <a role="button" class="collapse show text-uppercase d-block p-3" data-toggle="collapse" href="#accordion1">Categories
                                    </a>
                                </h5>
                                <!-- Category Widget Content -->
                                <div id="accordion1" class="accordion-content widget-content collapse show" data-parent="#cat-accordion">
                                    <!-- Category Widget Items -->
                                    <ul class="widget-items">
                                        <li><a href="#" class="d-flex p-3"><span>Umum</span></a></li>
                                        <li><a href="<?= BASEURL."pengguna/lupaPasssword" ?>" class="d-flex p-3"><span>Ubah Password</span></a></li>
                                        <li><a href="#" class="d-flex p-3"><span>Disukai</span><span class="ml-auto">(27)</span></a></li>
                                        <li><a href="#" class="d-flex p-3"><span>Testimoni</span><span class="ml-auto">(18)</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
            <div class="col-12 col-lg-9">
                <!-- Single Blog Details -->
                <article class="single-blog-details">
                    <!-- Blog Thumb -->
                    <div class="blog-thumb">
                        <?php
                            foreach($media as $m){
                        ?>
                            <a href="#"><img src="<?= BASEASSET."images/upload/kos/".$m['link_media'] ?>" alt=""></a>
                        <?php } ?>
                    </div>
                    <!-- Blog Content -->
                    <div class="blog-content appo-blog">
                        <!-- Meta Info -->
                        <div class="meta-info d-flex flex-wrap align-items-center py-2">
                            <ul>
                                <li class="d-inline-block p-2">Oleh <a href="#"><?= $data['nama'] ?></a></li>
                                <li class="d-inline-block p-2"><a href="#"><?= App::date($data['tanggal_ditambahkan'], "d M Y, H:i") ?></a></li>
                                <li class="d-inline-block p-2"><a href="#">2 Comments</a></li>
                            </ul>
                            <!-- Blog Share -->
                            <div class="blog-share ml-auto d-none d-sm-block">
                                <!-- Social Icons -->
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
                            </div>
                        </div>
                        <!-- Blog Details -->
                        <div class="blog-details">
                            <h3 class="blog-title py-2 py-sm-3"><a href="#"><?= $data['nama_kos'] ?></a></h3>
                            <p class="d-none d-sm-block"><?= $data['deskripsi'] ?></p>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
<!-- ***** Blog Area End ***** -->