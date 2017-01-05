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

// $classes = "azp_row";


// if(!empty($class)){
// 	$classes .= ' '.$class;
// }

// $classes = 'class="'.$classes.'"';
 
// if(!empty($id)){
// 	$id = 'id="'.$id.'"';
// }
?>
<?php if(!empty($content)) :?>
<div class="azp_container">
	<div class="azp_row">
		<div class="col-lg-12">
			<?php echo ElementParser::do_shortcode( $content );?>
		</div>
	</div>
</div>
<?php endif;?>

<?php if(count($rowColumnsArray)): 
		foreach ($rowColumnsArray as $key => $col) : ?>
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
			<div <?php echo $colID . ' ' .$colClass.' '.$col['columnstyle'].' '.$colAniData;?>>
				<?php if(!empty($col['wrapclass'])){

					echo '<div class="'.$col['wrapclass'].'">'.$col['content'].'</div>';

				}else{
					echo $col['content'];
				}?>
			</div>
		<?php endforeach; endif;?>