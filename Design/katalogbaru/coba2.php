
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tambah Kos</title>
    <link rel="shortcut icon" href="http://localhost/Web_Kelompok_2/assets//images/favicon.ico" />
    <!-- plugins:css -->
    <link rel="stylesheet" href="http://localhost/Web_Kelompok_2/assets//vendors/iconfonts/mdi/css/materialdesignicons.css">
    <!-- endinject -->
    <!-- vendor css for this page -->
    <!-- End vendor css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="http://localhost/Web_Kelompok_2/assets//css/shared/style.css">
    <!-- endinject -->
    <!-- Layout style -->
    <link rel="stylesheet" href="http://localhost/Web_Kelompok_2/assets//vendors/dropzone/dropzone.css">
    <link rel="stylesheet" href="http://localhost/Web_Kelompok_2/assets//css/demo_1/style.css">
    <link rel="stylesheet" href="http://localhost/Web_Kelompok_2/assets//css/customBack.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/Web_Kelompok_2/assets/vendors/datatables/css/datatables.min.css"/>
    <!-- Layout style -->
</head>
<body class="header-fixed" onload="initGeolocation()">

    <nav class="t-header">
    <div class="t-header-brand-wrapper">
    <a href="index.html">
        <!-- <img class="logo" src="../assets/images/logo.svg" alt=""> -->
        <!-- <img class="logo-mini" src="../assets/images/logo_mini.svg" alt=""> -->
        <h3 style="color:#777">Papikos</h3>
    </a>
    </div>
    <div class="t-header-content-wrapper">
    <div class="t-header-content">
        <button class="t-header-toggler t-header-mobile-toggler d-block d-lg-none">
        <i class="mdi mdi-menu"></i>
        </button>
        <form action="#" class="t-header-search-box">
        <div class="input-group">
            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Search" autocomplete="off">
            <button class="btn btn-primary" type="submit"><i class="mdi mdi-arrow-right-thick"></i></button>
        </div>
        </form>
        <ul class="nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="notificationDropdown" data-toggle="dropdown" aria-expanded="false">
            <i class="mdi mdi-bell-outline mdi-1x"></i>
            </a>
            <div class="dropdown-menu navbar-dropdown dropdown-menu-right" aria-labelledby="notificationDropdown">
            <div class="dropdown-header">
                <h6 class="dropdown-title">Notifications</h6>
                <p class="dropdown-title-text">You have 4 unread notification</p>
            </div>
            <div class="dropdown-body">
                <div class="dropdown-list">
                <div class="icon-wrapper rounded-circle bg-inverse-primary text-primary">
                    <i class="mdi mdi-alert"></i>
                </div>
                <div class="content-wrapper">
                    <small class="name">Storage Full</small>
                    <small class="content-text">Server storage almost full</small>
                </div>
                </div>
                <div class="dropdown-list">
                <div class="icon-wrapper rounded-circle bg-inverse-success text-success">
                    <i class="mdi mdi-cloud-upload"></i>
                </div>
                <div class="content-wrapper">
                    <small class="name">Upload Completed</small>
                    <small class="content-text">3 Files uploded successfully</small>
                </div>
                </div>
                <div class="dropdown-list">
                <div class="icon-wrapper rounded-circle bg-inverse-warning text-warning">
                    <i class="mdi mdi-security"></i>
                </div>
                <div class="content-wrapper">
                    <small class="name">Authentication Required</small>
                    <small class="content-text">Please verify your password to continue using cloud services</small>
                </div>
                </div>
            </div>
            <div class="dropdown-footer">
                <a href="#">View All</a>
            </div>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="messageDropdown" data-toggle="dropdown" aria-expanded="false">
            <i class="mdi mdi-message-outline mdi-1x"></i>
            <span class="notification-indicator notification-indicator-primary notification-indicator-ripple"></span>
            </a>
            <div class="dropdown-menu navbar-dropdown dropdown-menu-right" aria-labelledby="messageDropdown">
            <div class="dropdown-header">
                <h6 class="dropdown-title">Messages</h6>
                <p class="dropdown-title-text">You have 4 unread messages</p>
            </div>
            <div class="dropdown-body">
                <div class="dropdown-list">
                <div class="image-wrapper">
                    <img class="profile-img" src="../assets/images/profile/male/image_1.png" alt="profile image">
                    <div class="status-indicator rounded-indicator bg-success"></div>
                </div>
                <div class="content-wrapper">
                    <small class="name">Clifford Gordon</small>
                    <small class="content-text">Lorem ipsum dolor sit amet.</small>
                </div>
                </div>
                <div class="dropdown-list">
                <div class="image-wrapper">
                    <img class="profile-img" src="../assets/images/profile/female/image_2.png" alt="profile image">
                    <div class="status-indicator rounded-indicator bg-success"></div>
                </div>
                <div class="content-wrapper">
                    <small class="name">Rachel Doyle</small>
                    <small class="content-text">Lorem ipsum dolor sit amet.</small>
                </div>
                </div>
                <div class="dropdown-list">
                <div class="image-wrapper">
                    <img class="profile-img" src="../assets/images/profile/male/image_3.png" alt="profile image">
                    <div class="status-indicator rounded-indicator bg-warning"></div>
                </div>
                <div class="content-wrapper">
                    <small class="name">Lewis Guzman</small>
                    <small class="content-text">Lorem ipsum dolor sit amet.</small>
                </div>
                </div>
            </div>
            <div class="dropdown-footer">
                <a href="#">View All</a>
            </div>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="appsDropdown" data-toggle="dropdown" aria-expanded="false">
            <i class="mdi mdi-apps mdi-1x"></i>
            </a>
            <div class="dropdown-menu navbar-dropdown dropdown-menu-right" aria-labelledby="appsDropdown">
            <div class="dropdown-header">
                <h6 class="dropdown-title">Apps</h6>
                <p class="dropdown-title-text mt-2">Authentication required for 3 apps</p>
            </div>
            <div class="dropdown-body border-top pt-0">
                <a class="dropdown-grid">
                <i class="grid-icon mdi mdi-jira mdi-2x"></i>
                <span class="grid-tittle">Google</span>
                </a>
                <a class="dropdown-grid">
                <i class="grid-icon mdi mdi-trello mdi-2x"></i>
                <span class="grid-tittle">Facebook</span>
                </a>
                <a class="dropdown-grid">
                <i class="grid-icon mdi mdi-artstation mdi-2x"></i>
                <span class="grid-tittle">No Hp</span>
                </a>
            </div>
            <div class="dropdown-footer">
                <a href="http://localhost/Web_Kelompok_2/keluar">Keluar</a>
            </div>
            </div>
        </li>
        </ul>
    </div>
    </div>
</nav><div class="page-body">
        <div class="sidebar">
    <div class="user-profile">
        <div class="display-avatar animated-avatar">
        <img class="profile-img img-lg rounded-circle" src="http://localhost/Web_Kelompok_2/assets//images/profile/male/image_1.png" alt="profile image">
        </div>
        <div class="info-wrapper">
        <p class="user-name">Wildan</p>
        <h6 class="display-income">Admin</h6>
        </div>
    </div>
    <ul class="navigation-menu">
        <li class="nav-category-divider">MAIN</li>
        <li>
            <a href="http://localhost/Web_Kelompok_2/admin/dashboard">
                <span class="link-title">Dashboard</span>
                <i class="mdi mdi-gauge link-icon"></i>
            </a>
        </li>
        <li>
            <a href="http://localhost/Web_Kelompok_2/admin/kost">
                <span class="link-title">Kos</span>
                <i class="mdi mdi-account link-icon"></i>
            </a>
        </li>
                <li>
            <a href="http://localhost/Web_Kelompok_2/admin/pengguna">
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
                <a href="http://localhost/Web_Kelompok_2/admin/fasilitas">Fasilitas</a>
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
                <a href="http://localhost/Web_Kelompok_2/admin/kategori">Kategori</a>
                </li>
                <li>
                <a href="http://localhost/Web_Kelompok_2/admin/kategori/sub_kategori">Sub Kategori</a>
                </li>
            </ul>
        </li>
         
        <li class="nav-category-divider">Transaksi</li>
        <li>
            <a href="http://localhost/Web_Kelompok_2/admin/pemesanan">
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
                <li class="nav-category-divider">Pengaturan</li>
        <li>
            <a href="../docs/docs.html">
                <span class="link-title">Gmail</span>
                <i class="mdi mdi-asterisk link-icon"></i>
            </a>
        </li>
        <li>
            <a href="../docs/docs.html">
                <span class="link-title">Facebook</span>
                <i class="mdi mdi-asterisk link-icon"></i>
            </a>
        </li>
        <li>
            <a href="http://localhost/Web_Kelompok_2/admin/pemesanan">
                <span class="link-title">Profil</span>
                <i class="mdi mdi-asterisk link-icon"></i>
            </a>
        </li>
            </ul>
    <!-- <div class="sidebar-upgrade-banner">
        <p class="text-gray">Upgrade to <b class="text-primary">PRO</b> for more exciting features</p>
        <a class="btn upgrade-btn" target="_blank" href="http://www.uxcandy.co/product/label-pro-admin-template/">Upgrade to PRO</a>
    </div> -->
</div>    <div class="page-content-wrapper">
        <div class="page-content-wrapper-inner">
    <div class="viewport-header">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb has-arrow">
        <li class="breadcrumb-item">
            <a href="http://localhost/Web_Kelompok_2/admin/dashboard">Dashboard</a>
        </li>
                    <li class="breadcrumb-item " aria-current="page">
                                <a href="http://localhost/Web_Kelompok_2/admin/kost">
                    kost                </a>
                            </li>
                    <li class="breadcrumb-item active" aria-current="page">
                                    add                            </li>
                </ol>
    </nav>
</div>    <div class="content-viewport">
        <!-- <form method="post" action="#" enctype="multipart/form-data"> -->
            <div class="row">
                <div class="col-lg-6 equel-grid">
                    <div class="grid">
                        <p class="grid-header">Tambah Kos</p>
                        <div class="grid-body">
                            <div class="item-wrapper">
                            <div class="form-group">
                                    <label for="inputPassword1">Kategori</label>
                                    <select class="custom-select" name="kategori" id="kategori">
                                    <option value=' '>Pilih Kategori</option>
                                                                            <option  value='1'>Kost Area</option>
                                                                            <option  value='2'>Kontrakan</option>
                                                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword1">Jenis Kos</label>
                                    <select class="custom-select" name="jenis_kos" id="jenis_kos">
                                    <option value=' '>Pilih Kos</option>
                                                                            <option  value='1'>Laki laki</option>
                                        <option  value='2'>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1">Nama</label>
                                    <input type="text" id="nama" name="nama" class="form-control" value="" placeholder="Masukkan nama kos atau kontrakan">
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword1">Jumlah Kamar</label>
                                    <input type="number" min="1" id="jumlah_kamar" name="jumlah_kamar" class="form-control" value=""  placeholder="Masukkan jumlah kamar">
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword1">Sisa Kamar</label>
                                    <input type="number" min="0" id="sisa_kamar" name="sisa_kamar" class="form-control" value=""  placeholder="Masukkan sisa kamar ">
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword1">Fasilitas</label>
                                    <input type="text" min="0" id="fasilitas" name="fasilitas" class="form-control" value=""  placeholder="fasilitas di dalam kamar ">
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword1">Sub Fasilitas</label>
                                    <input type="text" min="0" id="fasilitas" name="fasilitas" class="form-control" value=""  placeholder="fasilitas di luar kamar ">
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword1">Harga</label>
                                    <input type="number" min="1" name="harga" id="harga" class="form-control" value="" placeholder="Masukkan harga ">
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword1">Deskripsi</label>
                                    <textarea name="deskripsi" id="ckedtor deskripsi" name="deskripsi" class=" ckeditor form-control" cols="30" rows="10"></textarea>
                                    <div class="alert alert-warning"><b>Perhatian</b>. sedikit review tentang kos juga akses jalan</div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 equel-grid">
                    <div class="grid">
                        <p class="grid-header">Foto / Video</p>
                        <div class="grid-body">
                            <div class="item-wrapper">
                                <div class="alert alert-warning"><b>Perhatian</b>. unggah file dengan type png, jpg, dan jpeg untuk video dengan type mp4 dengan ukuran maksimal 4MB</div>
                                <div class="dropzone dropzone-previews">
                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                                    <label for="inputPassword1">alamat</label>
                                    <input type="text" min="1" id="alamat" name="alamat" class="form-control" value=""  placeholder="Masukkan alamat ">
                                </div>
                        <p class="grid-header">Lokasi Kos</p>
                        <div class="grid-body">
                            <div class="item-wrapper">
                                <div class="alert alert-info"><b>Info</b>. pilih lokasi kos anda</div>
                                <div id="map">
                                                        
                                </div>                    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="equal-grid">
                <button type="submit" class="simpan btn btn-sm btn-primary pull-right">Tambah</button>
                </div>
            </div>
        <!-- </form> -->
    </div>
</div>        <footer class="footer">
    <div class="row">
    <div class="col-sm-6 text-center text-sm-right order-sm-1">
        <ul class="text-gray">
        <li><a href="#">Terms of use</a></li>
        <li><a href="#">Privacy Policy</a></li>
        </ul>
    </div>
    <div class="col-sm-6 text-center text-sm-left mt-3 mt-sm-0">
        <small class="text-muted d-block">Copyright © 2019 <a href="http://www.uxcandy.co" target="_blank">UXCANDY</a>. All rights reserved</small>
        <small class="text-gray mt-2">Handcrafted With <i class="mdi mdi-heart text-danger"></i></small>
    </div>
    </div>
</footer>        
    </div>
</div>    <script>var BASEURL = 'http://localhost/Web_Kelompok_2/'; var BASEADM = 'http://localhost/Web_Kelompok_2/admin/';</script>
    <script src="http://localhost/Web_Kelompok_2/assets//vendors/js/core.js"></script>
    <script src="http://localhost/Web_Kelompok_2/assets//js/jquery-3.3.1.min.js"></script>
    <!-- endinject -->
    <!-- Vendor Js For This Page Ends-->
    <script src="http://localhost/Web_Kelompok_2/assets//vendors/apexcharts/apexcharts.min.js"></script>
    <script src="http://localhost/Web_Kelompok_2/assets//vendors/chartjs/Chart.min.js"></script>
    <script src="http://localhost/Web_Kelompok_2/assets//js/charts/chartjs.addon.js"></script>
    <script type="text/javascript" src="http://localhost/Web_Kelompok_2/assets/vendors/datatables/js/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
    <!-- Vendor Js For This Page Ends-->
    <!-- build:js -->
    <script src="http://localhost/Web_Kelompok_2/assets//js/dashboard.js"></script>
    <script src="http://localhost/Web_Kelompok_2/assets//vendors/dropzone/dropzone.js"></script>

    <script>
        var latitude = "0", longitude = "0";
        // Initialize and add the map
        function initGeolocation() {
            if (navigator.geolocation) {
                // Call getCurrentPosition with success and failure callbacks
                navigator.geolocation.getCurrentPosition(success, fail);
            }
            else {
                alert("Sorry, your browser does not support geolocation services.");
            }
        }

        function success(position) {
            console.log("lat "+position.coords.latitude);
            latitude = position.coords.latitude;
            document.cookie = "lat ="+ position.coords.latitude;
            document.cookie = "long ="+ position.coords.longitude;
            longitude = position.coords.longitude;
            console.log("lat "+position.coords.longitude);
        }

        function fail() {
            // Could not obtain location
        }
        function initMap() {
            // The location of Uluru
            initGeolocation();
            var uluru = {lat: <br />
<b>Notice</b>:  Undefined index: lat in <b>C:\xampp1\htdocs\Web_Kelompok_2\views\back\index.php</b> on line <b>72</b><br />
, lng: <br />
<b>Notice</b>:  Undefined index: long in <b>C:\xampp1\htdocs\Web_Kelompok_2\views\back\index.php</b> on line <b>72</b><br />
};
            // The map, centered at Uluru
            var map = new google.maps.Map(
                document.getElementById('map'), {zoom: 15, center: uluru});
            // The marker, positioned at Uluru
            var marker = new google.maps.Marker({position: uluru, map: map});
            
        }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCOSKJIGO-yzFVyqEEzljduSDeVj0Z4_lo&callback=initMap">
    </script>
    <script src="http://localhost/Web_Kelompok_2/assets//js/template.js"></script>
    <script src="http://localhost/Web_Kelompok_2/assets//js/custom.js"></script>
    <!-- endbuild -->
    
</body>
</html>