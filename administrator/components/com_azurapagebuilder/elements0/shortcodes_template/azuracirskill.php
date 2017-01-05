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
extract(cth_shortcode_atts(array(
 	'percent' => '50',
 	//'title'=>'',
 	//'skill_bg' => '#e5e5e5',
 	'skill_val'=>'#13afeb',
 	'extraclass'=>'',
 	'layout'=>''
), $atts));


$classes = "azp_cir_skill piechart1";

$animation_data = self::buildAnimation($atts,'animate');

$classes .= ' '.$animation_data['trigger'];
$animationData = $animation_data['data'];

//$cirskillstyle = self::buildStyle($atts);


if(!empty($extraclass)){
	$classes .= ' '.$extraclass;
}
$classes = 'class="'.$classes.'"';

?>
<div <?php echo $classes;?>>
<?php if(JFactory::getApplication()->isAdmin()) :?>
	<div class="admin_circle" style="border-color:<?php echo $skill_val;?>;"> <span><?php echo $percent;?>%</span>
<?php else :?>
	<canvas class="loader" data-val="<?php echo $percent;?>"  data-cl="<?php echo $skill_val;?>"></canvas> <br /> 
<?php endif;?>
	<?php echo $content;?>
<?php if(JFactory::getApplication()->isAdmin()) :?>
	</div>
<?php endif;?> 
</div>
