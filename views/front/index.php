<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?></title>
    
    <link rel="icon" href="<?= BASEASSET ?>/images/favicon.png">
    <!-- ***** All CSS Files ***** -->

    <!-- Style css -->
    <link rel="stylesheet" href="<?=BASEASSET?>css/style.css">

    <!-- Responsive css -->
    <link rel="stylesheet" href="<?=BASEASSET?>css/responsive.css">
</head>
<body class="miami">
    <!--====== Preloader Area Start ======-->
    <div id="loader">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>
    <!--====== Preloader Area End ======-->

    <!--====== Scroll To Top Area Start ======-->
    <div id="scrollUp" title="Scroll To Top">
        <i class="icofont-bubble-up"></i>
    </div>
    
    <!--====== Scroll To Top Area End ======-->
<?php
if($content != 'user/login')
    include BASEPATH . "views/front/layout/navbar.php";

if($content == 'site/home')
    include BASEPATH . "views/front/layout/header.php";

include BASEPATH . "views/front/content/$content.php";
if($content != 'user/login')
    include BASEPATH . "views/front/layout/footer.php";

?>

<script>var BASEURL = '<?php echo BASEURL ?>'; var BASEADM = '<?php echo BASEADM ?>';</script>
<script src="<?php echo BASEASSET ?>js/jquery-3.3.1.min.js"></script>
<script src="<?php echo BASEASSET ?>js/script.js"></script>

<!-- Bootstrap js -->
<script src="<?php echo BASEASSET ?>vendors/bootstrap/popper.min.js"></script>
<script src="<?php echo BASEASSET ?>vendors/bootstrap/bootstrap.min.js"></script>

<!-- Plugins js -->
<script src="<?php echo BASEASSET ?>js/plugins.min.js"></script>

<!-- Active js -->
<script src="<?php echo BASEASSET ?>/js/active.js"></script>


</body>
</html>