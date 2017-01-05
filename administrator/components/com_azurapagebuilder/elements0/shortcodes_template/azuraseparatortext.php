<?php
/**
 * @package Azura Joomla Pagebuilder
 * @author Cththemes - www.cththemes.com
 * @date: 15-07-2014
 *
 * @copyright  Copyright ( C ) 2014 cththemes.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */
defined('_JEXEC') or die();
extract(cth_shortcode_atts(array(
	'title'=>'',
	'titleposition'=>'separator_align_center',
	'color' => 'grey',
	'style'=>'border',
	'width'=>'100',
	'extraclass'=>'',
	'layout'=>''
), $atts));


$classes = "azura_separator";

$animation_data = self::buildAnimation($atts,'animate');

$classes .= ' '.$animation_data['trigger'];
$animationData = $animation_data['data'];

$separatortextstyle = self::buildStyle($atts);

if(!empty($extraclass)){
    $classes .= ' '.$extraclass;
}
$classes .= ' sep_'.$style;
$classes .= ' sep_color_'.$color;
$classes .= ' ele_width_'.$width;

$classes = 'class="'.$classes.'"';
 
if(!empty($id)){
    $id = 'id="'.$id.'"';
}


?>
<div <?php echo $classes.' '.$separatortextstyle.' '.$animationData;?>>
    <span class="sep_holder sep_l"><span class="sep_line"></span></span>
    <?php if(!empty($title)) :?>
    <h4><?php echo $title;?></h4>
    <?php endif;?>
    <span class="sep_holder sep_r"><span class="sep_line"></span></span>
</div>