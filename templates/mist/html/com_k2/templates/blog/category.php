<?php
/**
 * @package Hoxa - Responsive Multipurpose Joomla Template
 * @author Cththemes - www.cththemes.com
 * @date: 01-10-2014
 *
 * @copyright  Copyright ( C ) 2014 cththemes.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */
// no direct access
defined('_JEXEC') or die;

$menu = JFactory::getApplication()->getMenu();
$defaultMenu = $menu->getDefault();
$activeMenu = $menu->getActive() ? $menu->getActive() : $menu->getDefault();

$blog_cols = '2';
$blog_style = 'grid';
if($activeMenu->params->get('blog_cols')){
	$blog_cols = $activeMenu->params->get('blog_cols','2');
}
if($activeMenu->params->get('blog_style')){
	$blog_style = $activeMenu->params->get('blog_style','grid');
}

//require_once JPATH_BASE.'/components/com_azurapagebuilder/helpers/elementparser.php';

switch ($blog_style) {
	case 'grid':
		$item_layout = 'item-grid';
		require_once dirname(__FILE__).'/category_grid.php';
		break;
	case 'masonry':
		$item_layout = 'item-masonry';
		require_once dirname(__FILE__).'/category_masonry.php';
		break;
	case 'list':
		$item_layout = 'item-list';
		require_once dirname(__FILE__).'/category_list.php';
		break;
	case 'timeline':
		$item_layout = 'item-timeline';
		require_once dirname(__FILE__).'/category_timeline.php';
		break;
	default:
		$item_layout = 'item-grid';
		require_once dirname(__FILE__).'/category_grid.php';
		break;
}

?>