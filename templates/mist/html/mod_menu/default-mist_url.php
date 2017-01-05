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
$faicon = '';
// $menu = $app->getMenu();
// $defaultMenu = $menu->getDefault();
// $activeMenu = $menu->getActive()? $menu->getActive() : $defaultMenu;
$anchor_css_active=$activeMenu->params->get('menu-anchor_css',''); 

$iconclass = $item->params->get('iconclass');
$subtt     = $item->params->get('subtitle');
$showmenuicon = $params0->get('showmenuicon',0);

if($showmenuicon == 1)
{
	if(!empty($iconclass))
		$faicon = '<i class="'.$iconclass.'"></i>';
}

$subtitle = '';
if(!empty($subtt ) and $anchor_css_active != 'site-header-3')
{
	$subtitle = '<small>'.$subtt .'</small>';
}

// active menu
if ($item->id == $active_id)
{
	$item->anchor_css .= ' active';
}

if (in_array($item->id, $path))
{
	$item->anchor_css .= ' active';
}
elseif ($item->type == 'alias')
{
	$aliasToId = $item->params->get('aliasoptions');

	if (count($path) > 0 && $aliasToId == $path[count($path) - 1])
	{
		$item->anchor_css .= ' active';
	}
	elseif (in_array($aliasToId, $path))
	{
		$item->anchor_css .= ' alias-parent-active';
	}
}

// Note. It is important to remove spaces between elements.
$class = $item->anchor_css ? 'class="' . $item->anchor_css . '" ' : '';
$title = $item->anchor_title ? 'title="' . $item->anchor_title . '" ' : '';

if ($item->menu_image)
	{
		$item->params->get('menu_text', 1) ?
		$linktype = '<img src="' . $item->menu_image . '" alt="' . $item->title . '" /><span class="image-title">' .preg_replace('/--([^-]*)--/', '$1', $item->title). '</span> ' :
		$linktype = '<img src="' . $item->menu_image . '" alt="' . $item->title . '" />';
}
else
{
	if(!empty($micon)){
		$linktype = '<i class="glyphicon glyphicon-'.$micon.'"></i> '.preg_replace('/--([^-]*)--/', '$1', $item->title);
	}else{
		$linktype = preg_replace('/--([^-]*)--/', '$1', $item->title);
	}
}

switch ($item->browserNav)
{
	default:
	case 0:
?><a <?php echo $class;?> href="<?php echo $item->flink; ?>" <?php echo $title; ?>> <?php echo $faicon.' '.$linktype.' '.$subtitle; ?></a><?php
		break;
	case 1:
		// _blank
?><a <?php echo $class; ?> href="<?php echo $item->flink; ?>" target="_blank" <?php echo $title; ?>> <?php echo $faicon.' '.$linktype.' '.$subtitle; ?></a><?php
		break;
	case 2:
	// window.open
?><a <?php echo $class; ?> href="<?php echo $item->flink; ?>" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes');return false;" <?php echo $title; ?>><?php echo $faicon.' '.$linktype.' '.$subtitle; ?></a>
<?php
		break;
}

//Check mega menu
if( $isMega == '1' ) {
	$megaPos = $item->params->get('megapos');
	$modules = JModuleHelper::getModules($megaPos);
	if(count($modules) > 0) {
	echo '<ul class="dropdown-menu"><li><div class="row '.$megaPos.'"></div></li></ul>';
	}
}
