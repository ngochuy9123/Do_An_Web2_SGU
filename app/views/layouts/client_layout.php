<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo empty($title) ?  "Website" : $title ?></title>

    <link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/public/assets/client/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/client/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/client/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/client/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/client/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/client/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/client/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/client/css/style.css" type="text/css">
</head>

<body>
    <input type="hidden" id="_WEB_ROOT" value="<?php echo _WEB_ROOT; ?>">

    <?php 
        
        $this->renderClient('blocks/header',$sub_content);
        // $this->renderView(empty($content) ? '/' : $content,empty($sub_data) ? [] : $sub_data);
        // $this->renderClient('clients/shop',$sub_content);
        $this->renderClient($gd,$sub_content);
        $this->renderClient('blocks/footer',$sub_content);
    ?>
</body>
<script src="<?php echo _WEB_ROOT ?>/public/assets/client/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/assets/client/js/ajaxClient.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/assets/client/js/bootstrap.min.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/assets/client/js/jquery.nice-select.min.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/assets/client/js/jquery.nicescroll.min.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/assets/client/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/assets/client/js/jquery.countdown.min.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/assets/client/js/jquery.slicknav.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/assets/client/js/mixitup.min.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/assets/client/js/owl.carousel.min.js"></script>
<script src="<?php echo _WEB_ROOT ?>/public/assets/client/js/main.js"></script>

</html>