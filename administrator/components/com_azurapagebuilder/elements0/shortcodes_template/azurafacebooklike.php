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
   	// 'id' => '',
	'url'=>'',
   	'extraclass' => '',
   	'type' => 'standard',
   	'width' => '',
   	'height'=>'',
   	'action'=>'like',
   	'face'=>'0',
   	'share'=>'0',
   	'uselike'=>'0',
   	'posts'=>'0',
   	'scheme'=>'light',
   	'layout'=>''
), $atts));


$classes = "azura_facebooklike";

$animation_data = self::buildAnimation($atts,'animate');

$classes .= ' '.$animation_data['trigger'];
$animationData = $animation_data['data'];

$facebooklikestyle = self::buildStyle($atts);


if($uselike === '1'){
	$classes .= ' fb_likebox_type_'.strtolower($type);
}else{
	$classes .= ' fb_type_'.strtolower($type);
}

if(!empty($extraclass)){
	$classes .= ' '.$extraclass;
}

$classes = 'class="'.$classes.'"';

if(empty($url)){
	$url = JURI::root();
}

if(!empty($width)){
	$width = '&amp;width='.(int)$width;
}

if(!empty($height)){
	$height = '&amp;height='.(int)$height;
}
?>

<?php if($uselike === '1') :?>
<div <?php echo $classes.' '.$facebooklikestyle.' '.$animationData;?>>
	<iframe src="//www.facebook.com/plugins/likebox.php?href=<?php echo $url.$width.$height;?>&amp;colorscheme=<?php echo $scheme;?>&amp;show_faces=<?php echo ($face === '1')? 'true' : 'false';?>&amp;header=true&amp;stream=<?php echo ($posts === '1')? 'true' : 'false';?>&amp;show_border=true" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
</div>
<?php else :?>
<div <?php echo $classes.' '.$facebooklikestyle.' '.$animationData;?>>
	<iframe src="//www.facebook.com/plugins/like.php?href=<?php echo $url;?><?php echo $width;?>&amp;layout=<?php echo $type;?>&amp;action=<?php echo $action;?>&amp;show_faces=<?php echo ($face === '1')? 'true' : 'false';?>&amp;share=<?php echo ($share === '1')? 'true' : 'false';?><?php echo $height;?>" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
</div>
<?php endif;?>