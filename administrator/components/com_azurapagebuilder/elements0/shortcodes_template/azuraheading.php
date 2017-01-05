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
   'elementtag' => 'h3',
   
   'textalign'=>'left',
   'fontsize'=>'',
   'lineheight'=>'',
   'font_color'=>'',
   'extraclass'=>'',
   'layout'=>''
), $atts));


$classes = "azura_heading azura_align_".$textalign;

$animation_data = self::buildAnimation($atts,'animate');

$classes .= ' '.$animation_data['trigger'];
$animationData = $animation_data['data'];

$headingstyle = self::buildStyle($atts);

if(!empty($extraclass)){
	$classes .= ' '.$extraclass;
}


$classes = 'class="'.$classes.'"';

$hstyle = '';

if(!empty($fontsize)){
	$hstyle .= 'font-size:'.str_replace(";", "", $fontsize).';';
}
if(!empty($lineheight)){
	$hstyle .= 'line-height:'.str_replace(";", "", $lineheight).';';
}
if(!empty($font_color)){
	$hstyle .= 'color:'.str_replace(";", "", $font_color).';';
}
if(!empty($hstyle)){
	$hstyle = 'style="'.$hstyle.'"';
}
?>
<div <?php echo $classes.' '.$headingstyle.' '.$animationData;?>>
	<<?php echo $elementtag;?> <?php echo $hstyle;?>><?php echo $content;?></<?php echo $elementtag;?>>
</div>