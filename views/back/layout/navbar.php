<nav>
    <div class="navbar-title">
        <div class="toggle-bar">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <a href="<?php echo BASEURL ?>">Jelajahin</a>
    </div>

    <div class="navbar-nav">
        <ul class="menu">
            <li><a href="<?php echo BASEADM ?>transaction&status=1">Transaksi <span class="sp"><?php echo Transaction::getOrderTotal() ?></span></a></li>
            <li>
                <a href="#" class="toggle">Account</a>
                <ul class="submenu">
                    <li><a href="<?php echo BASEADM ?>profile/">Ubah Profile</a></li>
                    <li><a href="<?php echo BASEADM ?>password/">Ubah Password</a></li>
                    <li><a href="<?php echo BASEURL ?>logout/">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>