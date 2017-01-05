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
$params = &JFactory::getApplication()->getTemplate(true)->params;
$layoutstyle         = $params->get('layoutstyle','rightsidebar');
?>

<?php if(isset($this->leading) && count($this->leading)): 
$leadingCount = count($this->leading);
$count = 0;
?>
<?php if($layoutstyle == 'rightsidebar' or $layoutstyle == 'leftsidebar'): ?>
<ul class="timeliner blog right">
<?php else: ?>
<ul class="timeliner blog">
<?php endif; ?>
<!-- Leading items -->
	<?php foreach($this->leading as $item): ?>
		<li<?php if($count % 2 !== 0) echo ' class="timeline-inverted"' ?>>
		<?php
			// Load category_item.php by default
			$this->item=$item;
			echo $this->loadTemplate($item_layout);
			$count += 1;
		?>
		</li>

	<?php endforeach; ?>
</ul>
<?php endif; ?>

<?php if(isset($this->primary) && count($this->primary)): 
$count = 0;
?>
<!-- Primary items -->
<?php if($layoutstyle == 'rightsidebar' or $layoutstyle == 'leftsidebar'): ?>
<ul class="timeliner blog right">
<?php else: ?>
<ul class="timeliner blog">
<?php endif; ?>
	<?php foreach($this->primary as $item): ?>
		<li<?php if($count % 2 !== 0) echo ' class="timeline-inverted"' ?>>
		<?php
			// Load category_item.php by default
			$this->item=$item;
			echo $this->loadTemplate($item_layout);
			$count += 1;
		?>
		</li>
	<?php endforeach; ?>
</ul>
<?php endif; ?>


<?php if(isset($this->secondary) && count($this->secondary)): 
$count = 0;
?>
<!-- Secondary items -->
<?php if($layoutstyle == 'rightsidebar' or $layoutstyle == 'leftsidebar'): ?>
<ul class="timeliner blog right">
<?php else: ?>
<ul class="timeliner blog">
<?php endif; ?>
	<?php foreach($this->secondary as $item): ?>
		<li<?php if($count % 2 !== 0) echo ' class="timeline-inverted"' ?>>
		<?php
			// Load category_item.php by default
			$this->item=$item;
			echo $this->loadTemplate($item_layout);
			$count += 1;
		?>
		</li>

	<?php endforeach; ?>
</ul>
<?php endif; ?>


<?php if($this->pagination->getPagesLinks()): ?>
    <?php if($this->params->get('catPagination')) echo $this->pagination->getPagesLinks(); ?>
<?php endif; ?>
