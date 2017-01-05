<?php
/**
 * @package Mist - Responsive Multipurpose Joomla Template
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
$n = 1;$m=1;
$count = $leadingCount;
?>

<!-- Leading items -->
	<?php foreach($this->leading as $item): ?>
		<?php if($n==1): ?> 
		<div class="row">
		<?php endif; ?>
		<?php
			// Load category_item.php by default
			$this->item=$item;
			echo $this->loadTemplate($item_layout);
		?>
		<?php if($n==$blog_cols or ($m==$count and $count%$blog_cols==1) or $m == $leadingCount){ echo '</div>';$n=1;} else $n++; ?>
		<?php $m++; ?>

	<?php endforeach; ?>

<?php endif; ?>

<?php if(isset($this->primary) && count($this->primary)): 
$n1 = 1;$m1=1;
$count1 = $this->primary;
?>

<!-- Primary items -->
	<?php foreach($this->primary as $item): ?>
		<?php if($n1==1): ?> 
		<div class="row">
		<?php endif; ?>
		<?php
			// Load category_item.php by default
			$this->item=$item;
			echo $this->loadTemplate($item_layout);
		?>
		<?php if($n1==$blog_cols or ($m1==$count1 and $count1%$blog_cols==1) or $m == $count1){ echo '</div>';$n1=1;} else $n1++; ?>
		<?php $m1++; ?>

	<?php endforeach; ?>

<?php endif; ?>


<?php if(isset($this->secondary) && count($this->secondary)): 
$n2 = 1;$m2=1;
$count2 = $this->secondary;
?>

<!-- Secondary items -->

	<?php foreach($this->secondary as $item): ?>
		<?php if($n2==1): ?> 
		<div class="row">
		<?php endif; ?>
		<?php
			// Load category_item.php by default
			$this->item=$item;
			echo $this->loadTemplate($item_layout);
		?>
		<?php if($n2==$blog_cols or ($m2==$count2 and $count2%$blog_cols==1) or $m == $count2){ echo '</div>';$n2=1;} else $n2++; ?>
		<?php $m2++; ?>

	<?php endforeach; ?>

<?php endif; ?>


<?php if($this->pagination->getPagesLinks()): ?>
    <?php if($this->params->get('catPagination')) echo $this->pagination->getPagesLinks(); ?>
<?php endif; ?>
