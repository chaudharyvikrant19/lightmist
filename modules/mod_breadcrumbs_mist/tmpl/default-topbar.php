<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_breadcrumbs
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('bootstrap.tooltip');

$str1 = '';
$str2 = '';
$lastitem = '';
?>
<?php
	if ($params->get('showHere', 1))
	{
		$str2 .= '<a class="active" href="">' . JText::_('MOD_BREADCRUMBS_HERE') . '&#160;</a>';
	}
	// Get rid of duplicated entries on trail including home page when using multilanguage
	for ($i = 0; $i < $count; $i++)
	{
		if ($i == 1 && !empty($list[$i]->link) && !empty($list[$i - 1]->link) && $list[$i]->link == $list[$i - 1]->link)
		{
			unset($list[$i]);
		}
	}

	// Find last and penultimate items in breadcrumbs list
	end($list);
	$last_item_key = key($list);
	prev($list);
	$penult_item_key = key($list);

	// Make a link if not the last item in the breadcrumbs
	$show_last = $params->get('showLast', 1);

	// Generate the trail
	foreach ($list as $key => $item) :
	if ($key != $last_item_key)
	{
		// Render all but last item - along with separator
		if (!empty($item->link))
		{
			$str2 .= '<li><a href="' . $item->link . '" class="pathway">' . $item->name . '</a></li>';
		}
		else
		{
			$str2 .= '<li><span>' . $item->name . '</span></li>';
		}

		if (($key != $penult_item_key) || $show_last)
		{
			//$str2 .= '<li><span class="divider">' . $separator . '</span></li>';
		}
	}
	elseif ($show_last)
	{
		// Render last item if reqd.
		$str2 .= '<li><a href="#">' . $item->name . '</a></li>';
		$lastitem = $item->name;
	}
	endforeach; ?>

	<ul class="breadcrumb <?php echo $moduleclass_sfx; ?>">
        <?php echo $str2; ?>
    </ul>