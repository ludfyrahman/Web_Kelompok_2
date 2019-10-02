<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="title">Logo Jatim</div>
                <div class="content" style="text-align: center;">
                    <img src="<?php echo BASEASSET ?>img/site/jatim2.png" alt="Jatm" style="width: 100px;">
                </div>
            </div>

            <div class="col-md-3">
                <div class="title">Tentang</div>
                <div class="content">
                    Ini adalah web pariwisata yang memuat informasi pariwisata di propinsi jawa timur, selain info pariwisata disini juga menyediakan informasi.
                </div>
            </div>

            <div class="col-md-3">
                <div class="title">Halaman</div>
                <div class="content">
                    <ul>
                        <li><a href="<?php echo BASEURL ?>filter&ty=pariwisata">Daftar Pariwisata</a></li>
                        <li><a href="<?php echo BASEURL ?>filter&ty=event">Daftar Event</a></li>
                        <li><a href="<?php echo BASEURL ?>filter&ty=hotel">Daftar Hotel</a></li>
                        <li><a href="<?php echo BASEURL ?>filter&ty=restaurant">Daftar Restoran</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3">
                <div class="title">Kontak</div>
                <div class="content">
                    <ul>
                        <li>No Hp: 081-011-111-111</li>
                        <li>Email: admin@jelajahin.com</li>
                        <li>Web: www.jelajahin.com</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                Copyright by Darmawan Saputra
            </div>
            <div class="col-md-6 right">
                Dedicated for LKS Web Design 2016
            </div>
        </div>
    </div>
</div>


<div class="floating floating-date">
    <div class="ic ic-date"></div>
    <div class="floating-body"><span class="time"></span></div>
</div>

<div class="floating floating-search">
    <div class="ic ic-search"></div>
    <div class="floating-body">
        <div class="form-group">
            <label for="keyword">Kata Kunci</label>
            <input type="text" class="form-control" id="keyword" placeholder="Kata Kunci...">
        </div>
        <div class="form-group">
            <label for="type">Tipe</label>
            <select id="type" class="form-control">
                <option value>- Select -</option>
                <option value="pariwisata">Pariwisata</option>
                <option value="event">Event</option>
                <option value="hotel">Hotel</option>
                <option value="restaurant">Restoran</option>
            </select>
        </div>
        <button class="btn btn-blue btn-block btn-cari">Cari</button>
    </div>
</div>