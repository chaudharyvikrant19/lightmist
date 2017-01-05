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
	'id'=>'',
	'extraclass'=>'',
	'textalign'=>'left',
	'buttontext'=>'',
	'heading'=>'',
	'buttonposition'=>'left',
	'url'=>'',
	'buttoncolor'=>'btn-default',
	'buttonsize'=>'',
	'target'=>'',
	'layout'=>''
), $atts));


if(!empty($id)) {
	$id = 'id="'.$id.'"';
}
$classes = 'azura_cta';

if(!empty($extraclass)) {
	$classes .= ' '.$extraclass;
}

$classes .= ' cta_align_'.$textalign;

$animation_data = self::buildAnimation($atts,'animate');

$classes .= ' '.$animation_data['trigger'];
$animationData = $animation_data['data'];

$ctastyle = self::buildStyle($atts);


$btnClass = 'azura_btn';

$btnClass .= ' azura_'.$buttoncolor;

if(!empty($buttonsize)){
	$btnClass .= ' azura_'.$buttonsize;
}

$btnClass = 'class="'.$btnClass.'"';

$classes = 'class="'.$classes.'"';

if(!empty($target)) {
	$target = 'target="'.$target.'"';
}

if(!empty($url)){
	$url = 'href="'.$url.'"';
}
	
?>
<div <?php echo $id.' '.$classes.' '.$ctastyle.' '.$animationData;?>>
	<?php if(!empty($heading)):?>
	<h1><?php echo $heading;?></h1>
	<?php endif;?>
  	<?php echo $content;?>
  	<p class="cta_btn_<?php echo $buttonposition;?>">
  		<a  <?php echo $btnClass.' '.$url.' '.$target;?>>
			<?php echo $buttontext;?>
		</a>
	</p>
</div>
