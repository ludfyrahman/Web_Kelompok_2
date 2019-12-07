<div class="sidebar">
    <div class="user-profile">
        <div class="display-avatar animated-avatar">
        <img class="profile-img img-lg rounded-circle" src="<?= BASEASSET ?>/images/profile/male/image_1.png" alt="profile image">
        </div>
        <div class="info-wrapper">
        <p class="user-name">Mochamad Ludfi Rahman</p>
        <h6 class="display-income">ludfyr@gmail.com</h6>
        </div>
    </div>
    <ul class="navigation-menu">
        <li class="nav-category-divider">MAIN</li>
        <li>
            <a href="<?= BASEADM."dashboard" ?>">
                <span class="link-title">Dashboard</span>
                <i class="mdi mdi-gauge link-icon"></i>
            </a>
        </li>
        <li>
            <a href="<?= BASEADM."kost" ?>">
                <span class="link-title">Kos</span>
                <i class="mdi mdi-account link-icon"></i>
            </a>
        </li>
        <li>
            <a href="<?= BASEADM."pengguna" ?>">
                <span class="link-title">Pengguna</span>
                <i class="mdi mdi-account link-icon"></i>
            </a>
        </li>
        <li>
            <a href="#fasilitas" data-toggle="collapse" aria-expanded="false">
                <span class="link-title">Fasilitas</span>
                <i class="mdi mdi-flask link-icon"></i>
            </a>
            <ul class="collapse navigation-submenu" id="fasilitas">
                <li>
                <a href="<?= BASEADM."fasilitas" ?>">Fasilitas</a>
                </li>
                <li>
                <a href="pages/sample-pages/error_2.html" target="_blank">Sub Fasilitas</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#kategori" data-toggle="collapse" aria-expanded="false">
                <span class="link-title">Kategori</span>
                <i class="mdi mdi-flask link-icon"></i>
            </a>
            <ul class="collapse navigation-submenu" id="kategori">
                <li>
                <a href="<?= BASEADM."kategori" ?>">Kategori</a>
                </li>
                <li>
                <a href="pages/sample-pages/error_2.html" target="_blank">Sub Kategori</a>
                </li>
            </ul>
        </li>
        
        <li class="nav-category-divider">Transaksi</li>
        <li>
            <a href="<?= BASEADM."pemesanan" ?>">
                <span class="link-title">Pemesanan</span>
                <i class="mdi mdi-asterisk link-icon"></i>
            </a>
        </li>
        <li>
            <a href="../docs/docs.html">
                <span class="link-title">Pembayaran</span>
                <i class="mdi mdi-asterisk link-icon"></i>
            </a>
        </li>
    </ul>
    <!-- <div class="sidebar-upgrade-banner">
        <p class="text-gray">Upgrade to <b class="text-primary">PRO</b> for more exciting features</p>
        <a class="btn upgrade-btn" target="_blank" href="http://www.uxcandy.co/product/label-pro-admin-template/">Upgrade to PRO</a>
    </div> -->
</div>