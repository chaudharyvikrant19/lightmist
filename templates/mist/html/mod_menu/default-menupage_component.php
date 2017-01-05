<?php
/**
 * @package Hoxa - Responsive MultiPurpose Joomla Template
 * @author Cththemes - www.cththemes.com
 * @date: 29-07-2014
 *
 * @copyright  Copyright ( C ) 2014 cththemes.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die;

// Note. It is important to remove spaces between elements.
$class = $item->anchor_css ? 'class="' . $item->anchor_css . '" ' : '';
$title = $item->anchor_title ? 'title="' . $item->anchor_title . '" ' : '';

if ($item->menu_image)
	{
		$item->params->get('menu_text', 1) ?
		$linktype = '<img src="' . $item->menu_image . '" alt="' . preg_replace('/--([^-]*)--/', '$1', $item->title) . '" /><span class="image-title">' . preg_replace('/--([^-]*)--/', '$1', $item->title) . '</span> ' :
		$linktype = '<img src="' . $item->menu_image . '" alt="' . preg_replace('/--([^-]*)--/', '$1', $item->title) . '" />';
}
else
{

	$linktype = $item->title;
}

switch ($item->browserNav)
{
	default:
	case 0:
?><i class="glyphicon glyphicon-arrow-right"></i> <a <?php echo $class; ?> href="<?php echo $item->flink; ?>" <?php echo $title; ?>> <?php echo $linktype; ?></a><?php
		break;
	case 1:
		// _blank
?><i class="glyphicon glyphicon-arrow-right"></i> <a <?php echo $class; ?> href="<?php echo $item->flink; ?>" target="_blank" <?php echo $title; ?>> <?php echo $linktype; ?></a><?php
		break;
	case 2:
	// window.open
?><i class="glyphicon glyphicon-arrow-right"></i> <a <?php echo $class; ?> href="<?php echo $item->flink; ?>" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes');return false;" <?php echo $title; ?>><?php echo $linktype; ?></a>
<?php
		break;
}
