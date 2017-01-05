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
$menu = JFactory::getApplication()->getMenu();
$activeMenu = $menu->getActive() ? $menu->getActive() : $menu->getDefault();

require_once JPATH_BASE.'/components/com_azurapagebuilder/helpers/elementparser.php';

// Get user stuff (do not change)
$user = JFactory::getUser();

?>

<?php if(isset($this->items) && count($this->items)) : ?>
<!-- Start K2 User Layout -->
<!-- Items -->
	<?php foreach($this->items as $item){
		//$catid = $item->catid;
		//if(in_array($catid, $cats)){
			// Load user_item.php by default
			$this->item=$item;
			echo $this->loadTemplate('item');
			//echo'<pre>';var_dump($item);die;
		//}
		
	} ?>
	
	<?php if($this->pagination->getPagesLinks()): ?>
		<div class="row nomargin-im">
		    <div class="col-lg-12">
	    		<?php if($this->params->get('catPagination')) echo $this->pagination->getPagesLinks();?>
	    	</div>
		</div>
	<?php endif; ?>
<?php else: ?>

	<?php if(!$this->params->get('googleSearch')): ?>
	<!-- No results found -->
	<div id="genericItemListNothingFound">
		<p><?php echo JText::_('K2_NO_RESULTS_FOUND');?></p>
	</div>
	<?php endif; ?>

<?php endif;?>

