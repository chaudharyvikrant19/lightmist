<?php
/**
 * @package Biss Corporate Joomla Template
 * @author Cththemes - www.cththemes.com
 * @date: 30-03-2015
 *
 * @copyright  Copyright ( C ) 2014 cththemes.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die;
require_once JPATH_BASE.'/components/com_azurapagebuilder/helpers/elementparser.php';
ElementParser::addShortcodeFiles();

// Note. It is important to remove spaces between elements.
?>

<?php
foreach ($list as $i => &$item)
{
	// Render the menu item.
	switch ($item->type) :
		case 'separator':
		case 'heading':
			require JModuleHelper::getLayoutPath('mod_menu', 'default_' . $item->type);
			break;
		case 'url':
		case 'component':
			require JModuleHelper::getLayoutPath('mod_menu', 'default-submenu-top_' . $item->type);
			break;

		default:
			require JModuleHelper::getLayoutPath('mod_menu', 'default-submenu-top_url');
			break;
	endswitch;
}
?>

