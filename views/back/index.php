<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title ?></title>
    <link rel="shortcut icon" href="<?php echo BASEASSET ?>/images/favicon.ico" />
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo BASEASSET ?>/vendors/iconfonts/mdi/css/materialdesignicons.css">
    <!-- endinject -->
    <!-- vendor css for this page -->
    <!-- End vendor css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo BASEASSET ?>/css/shared/style.css">
    <!-- endinject -->
    <!-- Layout style -->
    <link rel="stylesheet" href="<?php echo BASEASSET ?>/vendors/dropzone/dropzone.css">
    <link rel="stylesheet" href="<?php echo BASEASSET ?>/css/demo_1/style.css">
    <link rel="stylesheet" href="<?php echo BASEASSET ?>/css/customBack.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEASSET."vendors/datatables/css/datatables.min.css" ?>"/>
    <!-- Layout style -->
</head>
<body class="header-fixed" onload="initGeolocation()">

    <?php
    include BASEPATH . "views/back/layout/navbar.php";
    include BASEPATH . "views/back/layout/content.php";
    ?>
    <script>var BASEURL = '<?php echo BASEURL ?>'; var BASEADM = '<?php echo BASEADM ?>';</script>
    <script src="<?php echo BASEASSET ?>/vendors/js/core.js"></script>
    <script src="<?php echo BASEASSET ?>/js/jquery-3.3.1.min.js"></script>
    <!-- endinject -->
    <!-- Vendor Js For This Page Ends-->
    <script src="<?php echo BASEASSET ?>/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="<?php echo BASEASSET ?>/vendors/chartjs/Chart.min.js"></script>
    <script src="<?php echo BASEASSET ?>/js/charts/chartjs.addon.js"></script>
    <script type="text/javascript" src="<?= BASEASSET."vendors/datatables/js/datatables.min.js" ?>"></script>
    <script type="text/javascript" src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
    <!-- Vendor Js For This Page Ends-->
    <!-- build:js -->
    <script src="<?php echo BASEASSET ?>/js/dashboard.js"></script>
    <script src="<?php echo BASEASSET ?>/vendors/dropzone/dropzone.js"></script>

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
            var uluru = {lat: <?= ($data['latitude'] == null ? $_COOKIE['lat'] : $data['latitude']);?>, lng: <?= ($data['longitude'] == null ? $_COOKIE['long'] : $data['longitude']);?>};
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
    <script src="<?php echo BASEASSET ?>/js/template.js"></script>
    <script src="<?php echo BASEASSET ?>/js/custom.js"></script>
    <!-- endbuild -->
    
</body>
</html>