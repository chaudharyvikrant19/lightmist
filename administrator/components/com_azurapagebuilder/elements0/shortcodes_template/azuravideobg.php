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
AzuraJs::addStyle('ytplayer','/components/com_azurapagebuilder/assets/plugins/jquery.mb.YTPlayer-2.8.0/css/YTPlayer.css');
AzuraJs::addJScript('ytplayer','/components/com_azurapagebuilder/assets/plugins/jquery.mb.YTPlayer-2.8.0/inc/jquery.mb.YTPlayer.min.js');
extract(cth_shortcode_atts(array(
  	'id'=>'',
  	'class'=>'player',
  	'link'=>'V2rifmjZuKQ',
  	'autoplay'=>'1',
  	'loop'=>'1',
  	'mute'=>'1',
  	'vol'=>'50',
  	'quality'=>'default',
  	'ratio'=>'4/3',
  	'opacity'=>'1',
  	'containment'=>'self',
  	'startat'=>'20',
  	'showcontrols'=>'1',
  	'layout' => '','scrollreveal'=>''
), $atts));

$classes = ' azp_videobg';

if(!empty($class)){
	$classes .= ' '.$class;
}

//$classes = 'class="'.$classes.'"';
 
if(empty($id)){
	$id = uniqid('ytplayer-id');
}

$dataVideo = "{videoURL:'".$link."',";
if(!empty($containment)){
	$dataVideo .="containment:'".$containment."',";
}
if($autoplay != '1'){
	$dataVideo .="autoPlay:false,";
}
$dataVideo .="autoPlay:true,";
if($loop != '1'){
	$dataVideo .="loop:false,";
}
if($mute != '1'){
	$dataVideo .="mute:false,";
}else{
	$dataVideo .="mute:true,";
}
if($startat != '20'){
	$dataVideo .="startAt:".$startat.",";
}
if($opacity != '1'){
	$dataVideo .="opacity:".$opacity.",";
}
if($quality != 'default'){
	$dataVideo .="quality:'".$quality."',";
}
if($mute != '1'){
	if(!empty($vol)){
		$dataVideo .="vol:".$vol.",";
	}
}
$dataVideo .= "ratio:'".$ratio."'}";
?>
<?php if($showcontrols == '1') :?>
<a id="volume" onclick="jQuery('#<?php echo $id;?>').toggleVolume()"><i class="fa fa-volume-down"></i></a>
<?php endif;?>
<a id="<?php echo $id;?>" class="<?php echo $classes;?>" data-property="<?php echo $dataVideo;?>">youtube</a>
<script>
	jQuery(document).ready(function($){
		var myPlayer = $("#<?php echo $id;?>").YTPlayer({
        });
	});
</script>