<?php
/**
 * @package Mist Multi-purpose HTML Joomla Template
 * @author Cththemes - www.cththemes.com
 * @date: 30-03-2015
 *
 * @copyright  Copyright ( C ) 2014 cththemes.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die;
require_once JPATH_BASE.'/components/com_azurapagebuilder/helpers/elementparser.php';
ElementParser::addShortcodeFiles();
jimport( 'joomla.application.module.helper' );
$menu        = $app->getMenu();
$defaultMenu = $menu->getDefault();
$activeMenu  = $menu->getActive()? $menu->getActive() : $defaultMenu;
$params0     = &JFactory::getApplication()->getTemplate(true)->params;
$headerstyle = $activeMenu->params->get('headerstyle');
// Note. It is important to remove spaces between elements.
?>
<?php // The menu class is deprecated. Use nav instead. ?>
<ul class="nav navbar-nav <?php echo $class_sfx;?>"<?php
	$tag = '';

	if ($params->get('tag_id') != null)
	{
		$tag = $params->get('tag_id') . '';
		echo ' id="' . $tag . '"';
	}
?>>
<?php 
foreach ($list as $i => &$item)
{
	$class = 'item-' . $item->id;

	if ($item->id == $active_id)
	{
		$class .= ' active';
	}

	if (in_array($item->id, $path))
	{
		$class .= ' active';
	}
	elseif ($item->type == 'alias')
	{
		$aliasToId = $item->params->get('aliasoptions');

		if (count($path) > 0 && $aliasToId == $path[count($path) - 1])
		{
			$class .= ' active';
		}
		elseif (in_array($aliasToId, $path))
		{
			$class .= ' alias-parent-current';
		}
	}

	if ($item->type == 'separator')
	{
		$class .= ' divider';
	}

	if ($item->deeper)
	{
		$class .= ' deeper';
	}

	if ($item->parent)
	{
		$class .= ' parent';
	}

	// Mis mega menu class 
	$isMega = $item->params->get('ismegamenu');

	if($isMega == '1'){
		$class .= ' mega-menu';
	}

	if (!empty($class))
	{
		$class = ' class="' . trim($class) . '"';
	}

	echo '<li' . $class . '>';

	switch ($item->type) :
		case 'separator':
		case 'heading':
			require JModuleHelper::getLayoutPath('mod_menu', 'default_' . $item->type);
			break;
		case 'url':
		case 'component':
			require JModuleHelper::getLayoutPath('mod_menu', 'default-mist-onepage_' . $item->type);
			break;

		default:
			require JModuleHelper::getLayoutPath('mod_menu', 'default-mist-onepage_url');
			break;
	endswitch;

	// Render the menu item.
	
	
	// The next item is deeper.
	if ($item->deeper)
	{
		echo '<ul class="dropdown-menu">';
	}
	elseif ($item->shallower)
	{

		// The next item is shallower.
		echo '</li>';
		echo str_repeat('</ul></li>', $item->level_diff);
	}
	else
	{
		// The next item is on the same level.
		echo '</li>';
	}
}

	$modules = JModuleHelper::getModules('right_of_menu');
	if(count($modules) > 0) {
		$attribs   = array();
		$attribs['style'] = 'none';
		foreach($modules as $mod){
			$class_suf   = json_decode($mod->params)->moduleclass_sfx;
		    echo '<li class="'.$class_suf.'">'.JModuleHelper::renderModule($mod, $attribs).'</li>';
		}
	}

?></ul>
<?php if($headerstyle == 'header_logo_center'): 
$logoImage        = $params0->get('logoImage');
$logoText         = $params0->get('logoText');
$logoType         = $params0->get('logoType');
$logoWidth        = $params0->get('logoWidth');
$logoHeight       = $params0->get('logoHeight');
$sitename 		  = $app->getCfg('sitename');
$imgwidth 		  = '';
$imgheight 		  = '';
if(!empty($logoWidth))
	$imgwidth = 'width:'.$logoWidth.';';
if(!empty($logoHeight))
	$imgheight= ' height:'.$logoHeight.';';

$logo = '';
if( $logoType == 'image' )
{
    $logo .= '<img style="'.$imgwidth.$imgheight.'" class="site_logo" src="'.JURI::root(true).'/'.$logoImage.'" alt="'.$sitename.'" />';
}elseif( $logoType == 'text' ){
    $logo .= $logoText;
}else{
    $logo .= '<img style="'.$imgwidth.$imgheight.'" class="site_logo" src="'.JURI::root(true).'/'.$logoImage.'" alt="'.$sitename.'" />';
    $logo .= $logoText;
}

?>
<script type="text/javascript">
jQuery(function($){
	$('ul.nav.navbar-nav > li:eq(3)').after('<li class="center-logo"><a class="navbar-brand" href="./"><?php echo $logo; ?></a></li>');
});
</script>
<?php endif; ?>


