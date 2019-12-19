<!-- ***** Blog Area Start ***** -->
<section id="blog" class="section blog-area ptb_100">
    <div class="container">
        <div class="row">
            <?php
            Response::part('sidebar_profile');
            ?>
            <div class="col-12 col-lg-9">
                <!-- Single Blog Details -->
                <article class="single-blog-details">
                    <!-- Blog Thumb -->
                    <!-- <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Kos Jomblo</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pemesanan Kos Jomblo</li>
                        </ol>
                    </nav> -->
                    <h2 class="margin-top-bottom-12">Daftar Transaksi</h2>
                    <!-- <div class="row">
                        <div class="col-md-12 margin-top-bottom-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="margin-top-bottom-12">Nomor Invoice</p>
                                    <p class="margin-top-bottom-12  font-weight-bold"><a class="color-primary" target="_blank" href="<?= BASEURL."invoice/$data[id]" ?>"><?= invoice_code."".$data['id'] ?></a></p>
                                    <p class="margin-top-bottom-12">Nama Pemesan Kos</p>
                                    <p class="margin-top-bottom-12 font-weight-bold"><?= $data['nama'] ?></p>    
                                </div>
                                <div class="col-md-6">
                                    <p class="margin-top-bottom-12">Tanggal Pemesanan</p>
                                    <p class="margin-top-bottom-12 font-weight-bold"><?= App::Date($data['tanggal_pemesanan'], 'd M Y H:i:s') ?></p>
                                    <p class="margin-top-bottom-12">No Hp</p>
                                    <p class="margin-top-bottom-12 font-weight-bold"><?= Account::Get('no_hp') ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="blog-thumb">
                                <img src="<?= BASEASSET."images/upload/kos/".$media['link_media'] ?>" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="blog-content appo-blog">
                                <div class="blog-details">
                                    <h3 class="float-right"><?=App::price($data['harga'])?> / Bulan</h3>
                                    <h3 class="blog-title py-2 py-sm-3 inline"><?= $data['nama_kos'] ?></h3>
                                    <h5 class="margin-top-bottom-12">Tersedia <?= $data['jumlah_kamar']?> kamar</h5>
                                    <div class="row">
                                        <div class="col-md-8">
                                            Pembayaran DP 
                                        </div>
                                        <div class="col-md-4">
                                            <h3 class="float-right color-primary"><?= App::price(25/100 * $data['harga']) ?></h3>
                                        </div>
                                    </div>
                                    <div class="meta-info d-flex flex-wrap align-items-center py-2">
                                        <ul>
                                            <li class="d-inline-block p-2">Pemilik Kos <b><?= $data['nama_pemilik'] ?></b></li>
                                            <li class="d-inline-block p-2">Tanggal Pemesanan <?= App::date($data['tanggal_pemesanan'], "d M Y, H:i") ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <?php 
                                if($data['status_code']  == '1'){
                                ?>
                                <div class="col-md-6">
                                    <h3 class="margin-top-bottom-12">Pembayaran Melalui Rekening</h3>
                                    <p class="margin-top-bottom-12"><?=Account::Get('nama_bank')." ".Account::Get('no_rekening')."(".Account::Get('nama_rekening').")"?></p>
                                </div>
                                <div class="col-md-6">
                                    <p style="text-align:right">Batas maksimal pembayaran dp 1 x 24 jam</p>
                                    <a href="<?= BASEURL."pemesanan/bayar/".$data['id'] ?>" class='bayar'><button class="btn btn-success float-right" >Bayar Dp</button></a>
                                </div>
                                <?php }else{
                                $pesan = "";
                                $alert = "";
                                if($data['status_code'] == '0'){
                                    $pesan = "Pesanan anda ditolak oleh pemilik kos";
                                    $alert = "danger";
                                }else{
                                    $pesan = "Terimakasih anda sudah membayar dp kos";
                                    $alert = "success";
                                }
                                ?>
                                <div style="margin-top:12px;" class="col-md-12 text-center font-weight-bold alert alert-<?= $alert ?>">
                                    <?= $pesan ?>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div> -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="informasi-tab" data-toggle="tab" href="#dp" role="tab" aria-controls="dp" aria-selected="true"><i class="fa fa-clipboard-list"></i>  Menunggu Pembayaran Dp</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="ulasan-tab" data-toggle="tab" href="#pelunasan" role="tab" aria-controls="pelunasan" aria-selected="false"><i class="fa fa-swatchbook"></i> Menunggu Pelunasan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="ulasan-tab" data-toggle="tab" href="#dibatalkan" role="tab" aria-controls="dibatalkan" aria-selected="false"><i class="fa fa-swatchbook"></i> Dibatalkan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="ulasan-tab" data-toggle="tab" href="#lunas" role="tab" aria-controls="lunas" aria-selected="false"><i class="fa fa-swatchbook"></i> Lunas</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="dp" role="tabpanel" aria-labelledby="informasi-tab">
                            <div class="container">
                                <?php 
                                foreach ($dp as $d) {
                                ?>
                                <div class="margin-top-bottom-12 card-shadow">
                                    <h4 class="margin-top-bottom-12"><?= $d['nama'] ?></h4>
                                    <p class="margin-top-bottom-12">Total : <b class="color-primary"><?= App::price($d['harga']) ?></b> Tanggal Pembelian : <b><?= App::Date($d['tanggal_pemesanan'], 'd M Y') ?></b></p>
                                    <div class="alert alert-warning margin-top-bottom-12">
                                        <p>Bayar Sebelum <?= (date('d M Y H:i:s', strtotime($d['tanggal_pemesanan']. ' +1 day')))?></p>
                                    </div>
                                    <p class="margin-top-bottom-12">Kode Pemesanan : <a href="<?= BASEURL."akun/pemesanan/detail/".$d['id_pemesanan'] ?>"><b><?= invoice_code."".$d['id_pemesanan'] ?></b></a></p>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pelunasan" role="tabpanel" aria-labelledby="ulasan-tab">
                            <div class="container">
                                <?php 
                                foreach ($lunas as $p) {
                                ?>
                                <div class="margin-top-bottom-12 card-shadow">
                                    <h4 class="margin-top-bottom-12"><?= $p['nama'] ?></h4>
                                    <p class="margin-top-bottom-12">Total : <b class="color-primary"><?= App::price($p['harga']) ?></b> Tanggal Pembelian : <b><?= App::Date($p['tanggal_pemesanan'], 'd M Y') ?></b></p>
                                    <div class="alert alert-warning margin-top-bottom-12">
                                        <p>Bayar Sebelum <?= (date('d M Y H:i:s', strtotime($p['tanggal_pemesanan']. ' +7 day')))?></p>
                                    </div>
                                    <p class="margin-top-bottom-12">Kode Pemesanan : <a href="<?= BASEURL."akun/pemesanan/detail/".$p['id_pemesanan'] ?>"><b><?= invoice_code."".$p['id_pemesanan'] ?></b></a></p>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="dibatalkan" role="tabpanel" aria-labelledby="ulasan-tab">
                            <div class="container">
                                <?php 
                                foreach ($dibatalkan as $b) {
                                ?>
                                <div class="margin-top-bottom-12 card-shadow">
                                    <h4 class="margin-top-bottom-12"><?= $b['nama'] ?></h4>
                                    <p class="margin-top-bottom-12">Total : <b class="color-primary"><?= App::price($b['harga']) ?></b> Tanggal Pembelian : <b><?= App::Date($b['tanggal_pemesanan'], 'd M Y') ?></b></p>
                                    <div class="alert alert-danger margin-top-bottom-12">
                                        <p>Dibatalkan</p>
                                    </div>
                                    <p class="margin-top-bottom-12">Kode Pemesanan : <a href="<?= BASEURL."akun/pemesanan/detail/".$b['id_pemesanan'] ?>"><b><?= invoice_code."".$b['id_pemesanan'] ?></b></a></p>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="lunas" role="tabpanel" aria-labelledby="ulasan-tab">
                            <div class="container">
                                <?php 
                                foreach ($selesai as $l) {
                                ?>
                                <div class="margin-top-bottom-12 card-shadow">
                                    <h4 class="margin-top-bottom-12"><?= $l['nama'] ?></h4>
                                    <p class="margin-top-bottom-12">Total : <b class="color-primary"><?= App::price($l['harga']) ?></b> Tanggal Pembelian : <b><?= App::Date($l['tanggal_pemesanan'], 'd M Y') ?></b></p>
                                    <div class="alert alert-success margin-top-bottom-12">
                                        <p>Sudah Dibayarkan</p>
                                    </div>
                                    <p class="margin-top-bottom-12">Kode Pemesanan : <a href="<?= BASEURL."akun/pemesanan/detail/".$l['id_pemesanan'] ?>"><b><?= invoice_code."".$l['id_pemesanan'] ?></b></a></p>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
<!-- ***** Blog Area End ***** -->