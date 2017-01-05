<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_search
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$app = JFactory::getApplication();

$menu = $app->getMenu();
$defaultMenu = $menu->getDefault();
$activeMenu = $menu->getActive()? $menu->getActive() : $defaultMenu;
$anchor_css=$activeMenu->params->get('menu-anchor_css',''); 

?>
<?php if($anchor_css==='site-header-2'): ?>
<form action="<?php echo JRoute::_('index.php');?>" method="post" class="header-search header-search-white">
<?php else: ?>
<form action="<?php echo JRoute::_('index.php');?>" method="post" class="header-search">
<?php endif; ?>

	<?php
		//$output = '<label for="mod-search-searchword" class="element-invisible">' . $label . '</label> ';
		$output = '<input name="searchword" id="mod-search-searchword" maxlength="' . $maxlength . '"  type="text" placeholder="' . $text . '"  onblur="if (this.value==\'\') this.value=\'' . $text . '\';" onfocus="if (this.value==\'' . $text . '\') this.value=\'\';" />';

		if ($button) :
			if ($imagebutton) :
				$btn_output = ' <input type="image" value="' . $button_text . '" class="button" src="' . $img . '" onclick="this.form.searchword.focus();"/>';
			else :
				$btn_output = ' <button type="submit" onclick="this.form.searchword.focus();" class="biss-btn biss-btn-primary"><i class="fa fa-search"></i></button>';
			endif;

			switch ($button_pos) :
				case 'top' :
					$output = $btn_output . '<br />' . $output;
					break;

				case 'bottom' :
					$output .= '<br />' . $btn_output;
					break;

				case 'right' :
					$output .= $btn_output;
					break;

				case 'left' :
				default :
					$output = $btn_output . $output;
					break;
			endswitch;

		endif;

		echo $output;
	?>
	<input type="hidden" name="task" value="search" />
	<input type="hidden" name="option" value="com_search" />
	<input type="hidden" name="Itemid" value="<?php echo $mitemid; ?>" />
</form>


