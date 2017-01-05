<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_search
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<a href="#">
    <span class="searchbox-icon">
        <i class="fa fa-search"></i>
    </span>
</a>
<ul class="dropdown-menu left">
    <li>
        <form class="navbar-form navbar-left" action="<?php echo JRoute::_('index.php');?>" method="post">
			<div class="form-group">
			<?php
				//$output = '<label for="mod-search-searchword" class="element-invisible">' . $label . '</label> ';
				$output = '<input class="form-control" name="searchword" id="mod-search-searchword" maxlength="' . $maxlength . '"  type="text" value="' . $text . '"  onblur="if (this.value==\'\') this.value=\'' . $text . '\';" onfocus="if (this.value==\'' . $text . '\') this.value=\'\';" />';

				if ($button) :
					if ($imagebutton) :
						$btn_output = ' <input type="image" value="' . $button_text . '" class="button" src="' . $img . '" onclick="this.form.searchword.focus();"/>';
					else :
						$btn_output = '<span class="input-group-btn"> <button type="submit" style="border-top-left-radius: 0;border-bottom-left-radius: 0;" onclick="this.form.searchword.focus();" class="btn btn-default"><span class="input-group-btn">'. $button_text .'</span></button></span>';
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
			</div>
		</form>
    </li>
</ul>


