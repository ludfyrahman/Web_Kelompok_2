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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/fh-3.1.6/r-2.2.3/datatables.min.css"/>
    <!-- Layout style -->
</head>
<body class="header-fixed">

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
    <!-- Vendor Js For This Page Ends-->
    <!-- build:js -->
    <script src="<?php echo BASEASSET ?>/js/template.js"></script>
    <script src="<?php echo BASEASSET ?>/js/dashboard.js"></script>
    <script src="<?php echo BASEASSET ?>/vendors/dropzone/dropzone.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/fh-3.1.6/r-2.2.3/datatables.min.js"></script>
    <script src="<?php echo BASEASSET ?>/js/custom.js"></script>
    <!-- endbuild -->

</body>
</html>