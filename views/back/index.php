<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="<?php echo BASEASSET ?>css/grid.css">
    <link rel="stylesheet" href="<?php echo BASEASSET ?>css/use.css">
    <link rel="stylesheet" href="<?php echo BASEASSET ?>css/styleBack.css">
    <link rel="stylesheet" href="<?php echo BASEASSET ?>css/resBack.css">
</head>
<body>

<?php
include BASEPATH . "views/back/layout/navbar.php";
include BASEPATH . "views/back/layout/sidebar.php";
include BASEPATH . "views/back/layout/content.php";
?>

<script>var BASEURL = '<?php echo BASEURL ?>'; var BASEADM = '<?php echo BASEADM ?>';</script>
<script src="<?php echo BASEASSET ?>js/jquery.js"></script>
<script src="<?php echo BASEASSET ?>js/scriptBack.js"></script>

</body>
</html>