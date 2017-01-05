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
    'stopvalue' => '100',
    'title'=>'',
    //'skill_bg' => '#e5e5e5',
    'speed'=>'10000',
    'class'=>'',
    'layout'=>''
), $atts));

$classes = "counters5";

if(!empty($class)){
	$classes .= ' '.$class;
}

$classes = 'class="'.$classes.'"';
 
// if(!empty($id)){
// 	$id = 'id="'.$id.'"';
// }

$ele_data = 'data-countto="'.$stopvalue.'" data-speed="'.$speed.'"';

?>
<div <?php echo $classes ;?>>
	<?php if(!empty($title)):?>
	<h4><?php echo $title;?></h4>
	<?php endif;?>
	<span class="lin-counter" <?php echo $ele_data;?>><?php echo $stopvalue;?></span> 
	<?php echo $content;?>
</div>