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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Nama</label>
                                </div>
                                <div class="col-md-6">
                                    <?= Account::Get("nama") ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Email</label>
                                </div>
                                <div class="col-md-6">
                                    <?= Account::Get("email") ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">No HP</label>
                                </div>
                                <div class="col-md-6">
                                    <?= Account::Get("no_hp") ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Alamat</label>
                                </div>
                                <div class="col-md-6">
                                    <?= Account::Get("nama") ?>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
<!-- ***** Blog Area End ***** -->