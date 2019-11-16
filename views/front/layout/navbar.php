<header class="section header-area">
    <div id="appo-header" class="main-header-area">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <a class="navbar-brand" href="#">
                    <img class="logo" src="<?= BASEASSET ?>/images/logo.svg" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#appo-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Appo Menu -->
                <div class="collapse navbar-collapse" id="appo-menu">
                    <!-- Header Items -->
                    <ul class="navbar-nav header-items ml-auto">
                        
                        <li class="nav-item">
                            <a class="nav-link scroll" href="#">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link scroll" href="#about">Tentang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link scroll" href="#features">Fitur</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link scroll" href="#kos">Kos</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link scroll" href="#team">Tim</a>
                        </li>
                        <?php 
                            if(isset($_SESSION['userid'])){
                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-2" role="button" data-toggle="dropdown">
                                <?= Account::Get('email')?>
                            </a>
                            <!-- Blog Menu -->
                            <div class="dropdown-menu mega-menu blog-menu px-3 py-md-3">
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="single-menu">
                                            <?php 
                                                if($_SESSION['userlevel'] != 3){
                                            ?>
                                            <li><a href="<?= BASEURL."admin/dashboard" ?>" class="dropdown-item" href="blog-two-column.html">Dashboard</a></li>
                                            <?php } ?>
                                            <li><a href="<?= BASEURL."pengguna/profile" ?>" class="dropdown-item" href="blog-two-column.html">Profil</a></li>
                                            <li><a href="<?= BASEURL."pengguna/keluar" ?>" class="dropdown-item" href="blog-two-column.html">Keluar</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>