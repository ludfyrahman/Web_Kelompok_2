<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="<?php echo BASEASSET ?>css/grid.css">
    <link rel="stylesheet" href="<?php echo BASEASSET ?>css/use.css">
    <link rel="stylesheet" href="<?php echo BASEASSET ?>css/style.css">
    <link rel="stylesheet" href="<?php echo BASEASSET ?>css/res.css">
</head>
<body>

<?php
include BASEPATH . "views/front/layout/navbar.php";

if($content == 'site/home')
    include BASEPATH . "views/front/layout/header.php";

include BASEPATH . "views/front/content/$content.php";
include BASEPATH . "views/front/layout/footer.php";

?>

<script>var BASEURL = '<?php echo BASEURL ?>'; var BASEADM = '<?php echo BASEADM ?>';</script>
<script src="<?php echo BASEASSET ?>js/jquery.js"></script>
<script src="<?php echo BASEASSET ?>js/script.js"></script>

</body>
</html>