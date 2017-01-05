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
   'id' => '',
   'class' => '',
   'value' => '',
   'title' => '',
   'type'=>'',
   'striped'=>'1',
   'animated' => '1',
   'aschild' => '0',
   'customstyle'=>'',
   'layout'=>''
), $atts));


$classes = "azura_progress-bar";

$animation_data = self::buildAnimation($atts,'animate');

$classes .= ' '.$animation_data['trigger'];
$animationData = $animation_data['data'];

$progressstyle = self::buildStyle($atts);

if(!empty($type)){
	$classes .= ' azura_progress-bar-'.strtolower($type);
}
if($striped !== '0'){
	$classes .= ' azura_progress-bar-striped';
}

if($striped !== '0' && $animated !== '0'){
	$classes .= ' active';
}

if(!empty($class)){
	$classes .= ' '.$class;
}

$classes = 'class="'.$classes.'"';
 
if(!empty($id)){
	$id = 'id="'.$id.'"';
}

$style = 'width:'.(int)$value.'%;';

if(!empty($customstyle)){
	$style .= ' '.$customstyle;
}

$style = 'style="'.$style.'"';

$srtitle = '<span class="sr-only">'.(int)$value.'% Complete (success)</span>';
// if(!empty($title)){
// 	$srtitle = $title;
// }
?>
<?php if(!empty($title)) :?>
<h3><?php echo $title;?></h3>
<?php endif;?>
<?php if($aschild !== '1') :?>
<div class="azura_progress" <?php echo $progressstyle;?>>
<?php endif;?>
  <div <?php echo $id.' '.$classes.' '.$animationData;?> role="progressbar" aria-valuenow="<?php echo (int)$value;?>" aria-valuemin="0" aria-valuemax="100" <?php echo $style;?>>
    	<?php echo $srtitle;?>
  </div>
<?php if($aschild !== '1') :?>
</div>
<?php endif;?>
