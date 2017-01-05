<?php 

defined('_JEXEC') or die;
jimport( 'joomla.application.module.helper' );
$logo = '';
if($logoType == 'image')
{
    $logo .= '<img class="site_logo" style="width:'.$logoWidth.'px;height: '.$logoHeight.'px" src="'.JURI::root(true).'/'.$logoImage.'" alt="'.$sitename.'" />';
}elseif($logoType == 'text'){
    $logo .= '<span class="logotext">'.$logoText.'</span>';
}else{
    $logo .= '<img class="site_logo" style="width:'.$logoWidth.'px;height: '.$logoHeight.'px" src="'.JURI::root(true).'/'.$logoImage.'" alt="'.$sitename.'" />';
    $logo .= '<span class="logotext">'.$logoText.'</span>';
}

$bodyclass = '';
if($bodylayout==='boxed') {
    $bodyclass .= 'boxed';
}

if ($footerstyle === '3')
    $bodyclass .= ' footer-hidden';
?>

<body <?php echo $bodyclass != '' ? 'class="'.$bodyclass.'"':''; ?> <?php if(!empty($bodybackgroundimage)) echo 'style="background-image:url('.JURI::root(true).'/'.$bodybackgroundimage.')"'; elseif(!empty($bodybackgroundcolor)) echo 'style="background-color:'.$bodybackgroundcolor.'"'; ?>>
    <div id="page" class="side-nav<?php if($footerstyle == '2') echo ' page-sticky-footer';?>" <?php if($footerstyle == '3') echo 'style="margin-bottom: 476px;"';?>>
     <!-- Page Loader -->
    <!-- <div id="pageloader">
        <div class="loader-item fa fa-spin text-color"></div>
    </div> -->
    <?php if ($this->countModules('main-nav')) : ?>
    <header>
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="brand-text hidden" href="./">
                        <?php echo $logo; ?>
                    </a> 
                    <!--TOGGLE BUTTON-->
                    <ul class="nav navbar-nav" id="sticky">
                        <li>
                            <a href="#" id="navigation-menu">
                                <i class="fa fa-bars"></i>
                            </a>
                        </li>
                    </ul></div>
                </div>
            </div>
        </nav>
        <!--WRAPPER-MENU-->
        <div id="wrapper" class="toggle-out">
            <div class="toggle-menu">
                <!--CLOSE BUTTON-->
                <a class="close-menu icon-cross2" href="#" id="navigation-close"></a>
                
                    <jdoc:include type="modules" name="main-nav" style="none" />
                
            </div>
        </div>
    </header>
    <?php endif; ?>

    <?php if($this->countModules('breadcrumbs')) : ?>
        <!-- Breadscrumbs start //-->
        <jdoc:include type="modules" name="breadcrumbs"  style="none" />
        <!-- Breadscrumbs end //-->
    <?php endif;?>


    <!-- Main slider start //-->
    <?php if($this->countModules('main-slider')): ?>
    <section class="slider">
    <jdoc:include type="modules" name="main-slider"  style="main-slider" />
    </section>
    <div class="clearfix"></div>
    <?php endif; ?>
    <!-- Main slider end //-->