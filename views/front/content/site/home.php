<div id="about" class="section">
    <div class="title">
        <div class="container">
            Pariwisata Propinsi Jawa Timur
        </div>
    </div>

    <div class="content">
        <div class="container">
            Ini adalah web pariwisata yang memuat informasi pariwisata di propinsi jawa timur ,selain info pariwisata disini juga menyediakan informasi tentang event / kegiatan menarik serta informasi tentang hotel, restoran, kuliner, dan juga terdapat fitur untuk memesan paket pariwisata.
            
            <div class="poins row">
                <div class="col-md-6">
                    <div class="item col-md-12">
                        <img src="<?php echo BASEASSET ?>img/site/poins.png" alt="ss">
                        <div class="data">
                            <h4>Aman Terkendali</h4>
                            <p>Perjalanan menuju pariwisata pasti aman dan tidak ada halangan yang berarti</p>
                        </div>
                    </div>
                    <div class="item col-md-12">
                        <img src="<?php echo BASEASSET ?>img/site/poins.png" alt="ss">
                        <div class="data">
                            <h4>Pariwisata Bagus</h4>
                            <p>Perjalanan menuju pariwisata pasti aman dan tidak ada halangan yang berarti</p>
                        </div>
                    </div>
                    <div class="item col-md-12">
                        <img src="<?php echo BASEASSET ?>img/site/poins.png" alt="ss">
                        <div class="data">
                            <h4>Hotel Tersedia</h4>
                            <p>Perjalanan menuju pariwisata pasti aman dan tidak ada halangan yang berarti</p>
                        </div>
                    </div>
                    <div class="item col-md-12">
                        <img src="<?php echo BASEASSET ?>img/site/poins.png" alt="ss">
                        <div class="data">
                            <h4>Biaya Terjangkau</h4>
                            <p>Perjalanan menuju pariwisata pasti aman dan tidak ada halangan yang berarti</p>
                        </div>
                    </div>
                    <div class="item col-md-12">
                        <img src="<?php echo BASEASSET ?>img/site/poins.png" alt="ss">
                        <div class="data">
                            <h4>Jalan Mendukung</h4>
                            <p>Perjalanan menuju pariwisata pasti aman dan tidak ada halangan yang berarti</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <video controls style="width: 100%">
                        <source src="<?php echo BASEASSET ?>video/wonderful.mp4">
                    </video>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="pariwisata" class="section">
    <div class="title">
        <div class="container">
            Pariwisata
        </div>
    </div>

    <div class="content">
        <div class="container">
            Ini adalah bagian daftar pariwisata yang ditampilkan, berikut daftar pariwisata yang ada di Propinsi jawa timur. Ini adalah bagian daftar pariwisata yang ditampilkan, berikut daftar pariwisata yang ada di Propinsi jawa timur.

            <div class="clear">
                <div class="pull-right">
                    <a href="<?php echo BASEURL ?>filter&ty=pariwisata"><button class="btn btn-blue btn-block">Lihat Semua</button></a>
                </div>
            </div>

            <div class="four-columns row">
                <?php
                foreach($pariwisata as $p) {
                    $p['cover'] = explode(',', $p['cover'])[0];
                    echo "<div class='item col-lg-3 col-md-6'>
                        <img src='".BASEASSET."img/pariwisata/$p[cover]' alt='Cover' class='cover'>
                        <div class='body'>
                            <h4>$p[title]</h4>
                            <p>".substr($p['text'], 0, 100)."</p>
                            <a href='".BASEURL."pariwisata/$p[permalink]/'><button class='btn btn-blue btn-block'>Read More</button></a>
                        </div>
                    </div>";
                }
                ?>
            </div>
        </div>
    </div>
</div>

<div id="event" class="section">
    <div class="title">
        <div class="container">
            Event
        </div>
    </div>

    <div class="content">
        <div class="container">
            Ini adalah bagian daftar Event yang ditampilkan, berikut daftar Event yang ada di Propinsi jawa timur. Ini adalah bagian daftar Event yang ditampilkan, berikut daftar Event yang ada di Propinsi jawa timur.

            <div class="clear">
                <div class="pull-right">
                    <a href="<?php echo BASEURL ?>filter&ty=event"><button class="btn btn-blue btn-block">Lihat Semua</button></a>
                </div>
            </div>

            <div class="two-columns row">
                <?php
                foreach($event as $p) {
                    $p['cover'] = explode(',', $p['cover'])[0];
                    echo "<div class='item col-md-6'>
                        <img src='".BASEASSET."img/event/$p[cover]' alt='Cover' class='cover'>
                        <div class='body'>
                            <h4>$p[title]</h4>
                            <p>".substr($p['text'], 0, 80)."</p>
                            <a href='".BASEURL."event/$p[permalink]/'><button class='btn btn-blue btn-block'>Read More</button></a>
                        </div>
                    </div>";
                }
                ?>
            </div>
        </div>
    </div>
</div>

<div id="hotel" class="section">
    <div class="title">
        <div class="container">
            Hotel
        </div>
    </div>

    <div class="content">
        <div class="container">
            Ini adalah bagian daftar Hotel yang ditampilkan, berikut daftar Hotel yang ada di Propinsi jawa timur. Ini adalah bagian daftar Hotel yang ditampilkan, berikut daftar Hotel yang ada di Propinsi jawa timur.

            <div class="clear">
                <div class="pull-right">
                    <a href="<?php echo BASEURL ?>filter&ty=hotel"><button class="btn btn-blue btn-block">Lihat Semua</button></a>
                </div>
            </div>

            <div class="five-columns row">
                <?php
                foreach($hotel as $p) {
                    $p['cover'] = explode(',', $p['cover'])[0];
                    echo "<div class='item col-md-2-4'>
                         <a href='".BASEURL."hotel/$p[permalink]/'><img src='".BASEASSET."img/hotel/$p[cover]' alt='Cover' class='cover'>
                        <div class='body'>
                            <h4>$p[title]</h4>
                        </div>
                        <div class='black-overlay'></div></a>
                    </div>";
                }
                ?>
            </div>
        </div>
    </div>
</div>


<div id="restaurant" class="section">
    <div class="title">
        <div class="container">
            Restoran
        </div>
    </div>

    <div class="content">
        <div class="container">
            Ini adalah bagian daftar Restoran yang ditampilkan, berikut daftar Restoran yang ada di Propinsi jawa timur. Ini adalah bagian daftar Restoran yang ditampilkan, berikut daftar Restoran yang ada di Propinsi jawa timur.

            <div class="clear">
                <div class="pull-right">
                    <a href="<?php echo BASEURL ?>filter&ty=restaurant"><button class="btn btn-blue btn-block">Lihat Semua</button></a>
                </div>
            </div>

            <div class="five-columns row">
                <?php
                foreach($restoran as $p) {
                    $p['cover'] = explode(',', $p['cover'])[0];
                    echo "<div class='item col-md-2-4'>
                         <a href='".BASEURL."restaurant/$p[permalink]/'><img src='".BASEASSET."img/restaurant/$p[cover]' alt='Cover' class='cover'>
                        <div class='body'>
                            <h4>$p[title]</h4>
                        </div>
                        <div class='black-overlay'></div></a>
                    </div>";
                }
                ?>
            </div>
        </div>
    </div>
</div>