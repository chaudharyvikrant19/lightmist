<?php 
/**
 * @package Azura Joomla Pagebuilder
 * @author Cththemes - www.cththemes.com
 * @date: 15-07-2014
 *
 * @copyright  Copyright ( C ) 2014 cththemes.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */
defined('_JEXEC') or die;

$classes = "azp_row";

$classes .= ' '.$animation_data['trigger'];

$animationData = $animation_data['data'];


if(!empty($class)){
	$classes .= ' '.$class;
}

$classes = 'class="'.$classes.'"';
 
if(!empty($id)){
	$id = 'id="'.$id.'"';
}
?>

<div <?php echo $id . ' ' .$classes.' '.$rowinnerstyle.' '.$animationData;?>>
	<?php if(count($rowInnerColumnsArray)): 
		foreach ($rowInnerColumnsArray as $key => $col) : ?>
		<?php $colClass = 'azp_col';
		$colClass .= ' '.$col['animationtrigger'];
		$colAniData = $col['animationdata'];
		if(empty($col['columnwidthclass'])){
			$colClass .= ' azp_col-sm-12';
		}else{
			$colClass .=' '.str_replace("col-md-", "azp_col-sm-", $col['columnwidthclass']);
		}
		// Responsive text
		if(!empty($col['responsivetext'])){
			$colClass .=' '.$col['responsivetext'];
		}

		if(!empty($col['class'])){
			$colClass .=' '.$col['class'];
		}
		$colID = '';
		if(!empty($col['id'])){
			$colID .= 'id="'.$col['id'].'"';
		}
		$colClass = 'class="'.$colClass.'"';
		?>
		<div <?php echo $colID . ' ' .$colClass.' '.$col['columnstyle'].' '.$colAniData;?>><?php echo $col['content'];?></div>
		<?php endforeach; 
	endif;?>
</div>