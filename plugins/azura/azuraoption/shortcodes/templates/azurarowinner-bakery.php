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

<?php if(count($rowInnerColumnsArray)): 
	foreach ($rowInnerColumnsArray as $key => $col) : ?>
	<div class="row">
	    <div role="tabpanel" class="bakery-menu">
			<?php echo $col['content'];?>
		</div>
	</div>
<?php endforeach; endif;?>