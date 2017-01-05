

<!-- ######### CSS STYLES ######### -->

    <!--=============== css  ===============-->
    <?php 
        // Font Awesome Icons
        $doc->addStylesheet($template_folder.'/css/'.$darklight.'/font-awesome.min.css','text/css','all');
        // Bootstrap core CSS
        $doc->addStylesheet($template_folder.'/css/'.$darklight.'/bootstrap.min.css','text/css','all');
        $doc->addStylesheet($template_folder.'/css/'.$darklight.'/hover-dropdown-menu.css','text/css','all');
        // Icomoon Icons
        $doc->addStylesheet($template_folder.'/css/'.$darklight.'/icons.css','text/css','all');
        // Revolution Slider
        $doc->addStylesheet($template_folder.'/css/'.$darklight.'/revolution-slider.css','text/css','all');
        $doc->addStylesheet($template_folder.'/css/'.$darklight.'/settings.css','text/css','all');
        //if($useanimation == '1') {
            // Animations
            $doc->addStylesheet($template_folder.'/css/'.$darklight.'/animate.min.css','text/css','all');
        //}
        $doc->addStylesheet($template_folder.'/css/'.$darklight.'/grid-rotator.css','text/css','all');
        // Owl Carousel Slider
        $doc->addStylesheet($template_folder.'/css/'.$darklight.'/owl/owl.carousel.css','text/css','all');
        $doc->addStylesheet($template_folder.'/css/'.$darklight.'/owl/owl.theme.css','text/css','all');
        $doc->addStylesheet($template_folder.'/css/'.$darklight.'/owl/owl.transitions.css','text/css','all');
        // PrettyPhoto Popup
        $doc->addStylesheet($template_folder.'/css/'.$darklight.'/prettyPhoto.css','text/css','all');
        // Custom Style
        $doc->addStylesheet($template_folder.'/css/'.$darklight.'/style.css','text/css','all');
        $doc->addStylesheet($template_folder.'/css/'.$darklight.'/responsive.css','text/css','all');
        // Color Scheme
        $doc->addStylesheet($template_folder.'/css/'.$darklight.'/color.css','text/css','all');
    ?>

    <!-- Fonts -->
    <?php if($useDifferentFont === '1') : ?>
        <link href='http://fonts.googleapis.com/css?family=<?php echo $bodyfont;?>' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=<?php echo $headingfont;?>' rel='stylesheet' type='text/css'>
        <style type="text/css">
            .tp-caption.modern_medium_fat,
            .tp-caption.modern_medium_fat_white,
            .tp-caption.modern_medium_light,
            .tp-caption.modern_big_bluebg,
            .tp-caption.modern_big_redbg,
            .tp-caption.description,
            .pricing .price-box .price span {
                font-family:<?php echo $bodyfontfamily;?>;
            }

            body {
              font-family: <?php echo $bodyfontfamily;?>;
            }
            input,
            button,
            select,
            textarea {
              font-family: <?php echo $bodyfontfamily;?>;
            }

            h1, h2, h3, h4, h5, h6 {
              font-family:<?php echo $headingfontfamily;?>;
            }
            .title,
            .pricing .price-box .price,
            .count-number .counter,
            .get-a-quote,
            .blog.timeliner >li .timeline-icon .date span,
            .countdown-amount,
            .schedule .tabs .nav-tabs > li,
            .price,
            .footer-count {
                font-family:<?php echo $headingfontfamily;?>;
            }
        </style>
    <?php else :
        $doc->addStylesheet($template_folder.'/css/'.$darklight.'/default-font.css','text/css','all'); ?>
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Arimo:300,400,700,400italic,700italic' />
        <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css' />
    <?php endif;?>

    <!-- Custom Style -->
    <?php  
        $doc->addStylesheet($template_folder.'/css/custom.css','text/css','all');
        $doc->addStylesheet($template_folder.'/css/virtuemart-custom.css','text/css','all');
    ?>
    <?php if($overrideColor == '1') :  ?>
    <link rel="stylesheet/less" type="text/css" href="<?php echo $template_folder.'/css/color.php?textcolor='.$textColor.'&bordercolor='.$borderColor.'&backgroundcolor='.$backgroundColor; ?>">
    <script type="text/javascript" src="<?php echo $template_folder; ?>/js/less-color.js"></script>
    <?php endif;?>

    <!-- JS includes //-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries //-->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]--> 
    <script type="text/javascript" src="<?php echo $template_folder; ?>/js/modernizr.js"></script> 
    <?php
        $doc->addScript($template_folder."/js/owl.carousel.min.js");
    ?>



