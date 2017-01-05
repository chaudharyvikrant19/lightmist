<?php
/**
*
* Layout for the add to cart popup
*
* @package	VirtueMart
* @subpackage Cart
* @author Max Milbers
*
* @link http://www.virtuemart.net
* @copyright Copyright (c) 2013 VirtueMart Team. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* VirtueMart is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* @version $Id: cart.php 2551 2010-09-30 18:52:40Z milbo $
*/

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');
echo '<div class="popup-addtocart">';
echo '<a class="continue_link" href="' . $this->continue_link . '" >' . vmText::_('TPL_MIST_CONTINUE_SHOPPING') . '</a>';
echo '<a class="showcart floatright" href="' . $this->cart_link . '">' . vmText::_('TPL_MIST_CART_SHOW') . '</a>';
if($this->products){
	foreach($this->products as $product){
		if($product->quantity>0){
			echo '<div class="info">';
			echo '<div class="addsuccess">'.JTEXT::_('TPL_MIST_ITEM_SUCCESSFULLY_ADDED_TO_CART_TEXT').'</div>';
			echo '<div>'.JTEXT::_('TPL_MIST_NAME_TEXT').' '.$product->product_name.'</div>';
			echo '<div class="quantity">'.JTEXT::_('TPL_MIST_QUANTITY_TEXT').' '.$product->quantity.'</div>';
			echo '</div>';
		} else {
			if(!empty($product->errorMsg)){
				echo '<div>'.$product->errorMsg.'</div>';
			}
		}

	}
}
echo '</div>';
?>
