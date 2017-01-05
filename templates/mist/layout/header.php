<?php 

defined('_JEXEC') or die;
$menu = JFactory::getApplication()->getMenu();
$defaultMenu = $menu->getDefault();
$activeMenu = $menu->getActive() ? $menu->getActive() : $menu->getDefault();
$headerstyle = $activeMenu->params->get('headerstyle','fixed_header');
$footerstyle = '1';
$footerdarklight = '0';
$footerclass = '';
$footercolumns = '4';

if($activeMenu->params->get('footerstyle')){
	$footerstyle = $activeMenu->params->get('footerstyle','1');
}

if($activeMenu->params->get('footerdarklight')){
	$footerdarklight = $activeMenu->params->get('footerdarklight');
}

if($activeMenu->params->get('footercolumns')){
	$footercolumns = $activeMenu->params->get('footercolumns','4');
}

if($activeMenu->params->get('bootstrapsize1')){
	$bootstrapsize1 = $activeMenu->params->get('bootstrapsize1','col-md-3');
}

if($activeMenu->params->get('bootstrapsize2')){
	$bootstrapsize2 = $activeMenu->params->get('bootstrapsize2','col-md-3');
}

if($activeMenu->params->get('bootstrapsize3')){
	$bootstrapsize3 = $activeMenu->params->get('bootstrapsize3','col-md-3');
}

if($activeMenu->params->get('bootstrapsize4')){
	$bootstrapsize4 = $activeMenu->params->get('bootstrapsize4','col-md-3');
}

?>
<!DOCTYPE html>
<!--[if IE 7]><html lang="<?php echo $this->language;?>" class="ie7"><![endif]-->
<!--[if IE 8]><html lang="<?php echo $this->language;?>" class="ie8"><![endif]-->
<!--[if IE 9]><html lang="<?php echo $this->language;?>" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]>< !--><html lang="<?php echo $this->language;?>"> <!--<![endif]-->
<head>
	<meta charset="<?php echo $this->_charset;?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<jdoc:include type="head" />
    <?php $doc->setMetaData('title', FALSE); ?>
	<!-- Standard Favicon--> 
	<link rel="shortcut icon" href="<?php echo JURI::base(true). (!empty($favicon)? '/'.$favicon : '/images/favicon/favicon.ico');?>">
	
	<!-- joomla default style -->
	<!-- <link rel="stylesheet" href="<?php echo $template_folder; ?>/css/jldefault-style.css"> -->

    <?php require_once dirname(__FILE__).'/header/profile/default.php'; ?>
    <?php //echo JURI::root(true); ?>
    
    <?php if(!empty($customStyleLinks)) {

		foreach ($customStyleLinks as $link) {
			echo '<link rel="stylesheet" type="text/css" href="'.$link.'" media="screen" />';
		}

	} ?>

	<script type="text/javascript" >
		baseUrl = '<?php echo JURI::root(true);?>';
		siteName = '<?php echo $sitename;?>';
		templateName = '<?php echo $this->template;?>';
	</script>
	
</head>
<?php 
	//$anchor_css=$activeMenu->params->get('menu-anchor_css',''); 

	require_once dirname(__FILE__).'/header/'.$headerstyle.'.php';
?>


