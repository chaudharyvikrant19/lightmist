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

?>


<?php if(isset($this->leading) && count($this->leading)): 
$leadingCount = count($this->leading);
?>
<div class="post-list">
<!-- Leading items -->
	<?php foreach($this->leading as $item): ?>

		<?php
			// Load category_item.php by default
			$this->item=$item;
			echo $this->loadTemplate($item_layout);
		?>
	<?php endforeach; ?>
</div>
<?php endif; ?>

<?php if(isset($this->primary) && count($this->primary)): ?>
<!-- Primary items -->
<div class="post-list">
	<?php foreach($this->primary as $item): ?>

		<?php
			// Load category_item.php by default
			$this->item=$item;
			echo $this->loadTemplate($item_layout);
		?>
	<?php endforeach; ?>
</div>
<?php endif; ?>


<?php if(isset($this->secondary) && count($this->secondary)): ?>
<!-- Secondary items -->
<div class="post-list">
	<?php foreach($this->secondary as $item): ?>
	
		<?php
			// Load category_item.php by default
			$this->item=$item;
			echo $this->loadTemplate($item_layout);
		?>

	<?php endforeach; ?>
</div>
<?php endif; ?>


<?php if($this->pagination->getPagesLinks()): ?>
    <?php if($this->params->get('catPagination')) echo $this->pagination->getPagesLinks(); ?>
<?php endif; ?>
