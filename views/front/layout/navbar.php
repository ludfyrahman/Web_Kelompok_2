<nav class="<?php echo ($content != 'site/home' ? 'navbar-style navbar-fixed' : '') ?>">
    <div class="container">
        <div class="navbar-logo">
            <a href="<?php echo BASEURL ?>">
                <img src="<?php echo BASEASSET ?>img/site/logo-white.png" alt="Logo" class="logo-white">
                <img src="<?php echo BASEASSET ?>img/site/logo-gray.png" alt="Logo" class="logo-gray">
            </a>
        </div>

        <div class="navbar-nav">
            <ul class="menu">
                <li><a href="<?php echo BASEURL ?>" data-target="#" class="<?php echo $content == 'site/home' ? 'nav-slide' : '' ?>">Home</a></li>
                <li><a href="<?php echo BASEURL ?>#about" data-target="#about" class="<?php echo $content == 'site/home' ? 'nav-slide' : '' ?>">About</a></li>
                <li><a href="<?php echo BASEURL ?>#pariwisata" data-target="#pariwisata" class="<?php echo $content == 'site/home' ? 'nav-slide' : '' ?>">Pariwisata</a></li>
                <li><a href="<?php echo BASEURL ?>#event" data-target="#event" class="<?php echo $content == 'site/home' ? 'nav-slide' : '' ?>">Event</a></li>
                <li><a href="<?php echo BASEURL ?>#hotel" data-target="#hotel" class="<?php echo $content == 'site/home' ? 'nav-slide' : '' ?>">Hotel</a></li>
                <li><a href="<?php echo BASEURL ?>#restaurant" data-target="#restaurant" class="<?php echo $content == 'site/home' ? 'nav-slide' : '' ?>">Restoran</a></li>

                <?php
                if(isset($_SESSION['userlevel'])) {
                    echo "<li>
                        <a href='#' class='toggle'>".explode(' ', Account::Get('name'))[0]."</a>
                        <ul class='submenu'>";

                    if($_SESSION['userlevel'] == 1) {
                        echo "<li><a href='".BASEURL."admin/account/'>Control Panel</a></li>";
                    }
                    else {
                        echo "<li><a href='".BASEURL."user/profile/'>Ubah Profil</a></li>";
                        echo "<li><a href='".BASEURL."user/password/'>Ubah Password</a></li>";
                        echo "<li><a href='".BASEURL."user/transaction/'>Daftar Transaksi</a></li>";
                    }

                    echo "<li><a href='".BASEURL."logout/'>Logout</a></li>
                        </ul>
                    </li>";
                }
                else {
                    echo "<li>
                        <a href='#' class='toggle'>Akun</a>
                        <ul class='submenu'>
                            <li><a href='".BASEURL."login/'>Login</a></li>
                            <li><a href='".BASEURL."register/'>Register</a></li>
                        </ul>
                    </li>";
                }
                ?>
            </ul>
        </div>

        <div class="toggle-bar">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
    </div>
</nav>