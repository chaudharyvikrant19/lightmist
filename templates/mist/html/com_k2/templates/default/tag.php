<?php
/**
 * @package Krobs - Personal Onepage Responsive Joomla Template
 * @author Cththemes - www.cththemes.com
 * @date: 01-10-2014
 *
 * @copyright  Copyright ( C ) 2014 cththemes.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

// no direct access
defined('_JEXEC') or die;
require_once JPATH_BASE.'/components/com_azurapagebuilder/helpers/elementparser.php';

?>

<!-- Start K2 Tag Layout -->

	<?php if(count($this->items)): ?>
		<?php foreach($this->items as $item){
			$this->item = $item;
			echo $this->loadTemplate('item');

		}
	 ?>

	<?php if($this->pagination->getPagesLinks()): ?>
	    <?php if($this->params->get('catPagination')) echo $this->pagination->getPagesLinks(); ?>
		
	<?php endif; ?>

	<?php endif; ?>

<!-- End K2 Tag Layout -->
