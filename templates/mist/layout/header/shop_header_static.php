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
    <div id="page" <?php if($footerstyle == '2') echo 'class="page-sticky-footer"'; if($footerstyle == '3') echo 'style="margin-bottom: 476px;"';?>>
     <!-- Page Loader -->
    <!-- <div id="pageloader">
        <div class="loader-item fa fa-spin text-color"></div>
    </div> -->
    <?php if ($this->countModules('top-info') || $this->countModules('top-social')) : ?>
        <!-- Top Bar -->
        <div id="top-bar" class="top-bar-section top-bar-bg-color shop-top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Top Contact -->
                        <?php if ($this->countModules('top-info')) : ?>
                        <div class="top-contact link-hover-black">
                            <jdoc:include type="modules" name="top-info" style="none" />
                        </div>
                        <?php endif; ?>
                        <?php if ($this->countModules('top-social')) : ?>
                        <!-- Top Social Icon -->
                        <div class="top-social-icon icons-hover-black">
                            <jdoc:include type="modules" name="top-social" style="none" />
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Bar -->
    <?php endif; ?>

    <?php if ($this->countModules('main-nav')) : ?>
    <!-- Simple Navbar -->
    <header id="sticker" class="sticky-navigation">
    <!-- <header class="simple-header"> -->
        <!-- navbar -->
        <div class="navbar navbar-default navbar-bg-light" role="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="navbar-header">
                        <!-- Button For Responsive toggle -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span> 
                        <span class="icon-bar"></span> 
                        <span class="icon-bar"></span> 
                        <span class="icon-bar"></span></button> 
                        <!-- Logo -->
                         
                        <a class="navbar-brand" href="./">
                            <?php echo $logo; ?>
                        </a></div>
                        
                        <!-- Navbar Collapse -->
                        <div class="navbar-collapse collapse">
                            <jdoc:include type="modules" name="main-nav" style="none" />
                        </div>
                        <!-- /.navbar-collapse -->
                        
                        
                    </div>
                    <!-- /.col-md-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </div>

        <?php if($this->countModules('mega-menu-pos-1')) : ?>
        <div class="mega-1">
            <jdoc:include type="modules" name="mega-menu-pos-1"  style="mega_menu" />
        </div>
        <?php endif;?>
        <?php if($this->countModules('mega-menu-pos-2')) : ?>
        <div class="mega-2">
            <jdoc:include type="modules" name="mega-menu-pos-2"  style="mega_menu" />
        </div>
        <?php endif;?>
        <?php if($this->countModules('mega-menu-pos-3')) : ?>
        <div class="mega-3">
            <jdoc:include type="modules" name="mega-menu-pos-3"  style="mega_menu" />
        </div>
        <?php endif;?>
        <?php if($this->countModules('mega-menu-pos-4')) : ?>
        <div class="mega-4">
            <jdoc:include type="modules" name="mega-menu-pos-4"  style="mega_menu" />
        </div>
        <?php endif;?>
        <?php if($this->countModules('mega-menu-pos-5')) : ?>
        <div class="mega-5">
            <jdoc:include type="modules" name="mega-menu-pos-5"  style="none" />
        </div>
        <?php endif;?>
        <!-- navbar -->
    </header>
    <!-- Simple Navbar end -->
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