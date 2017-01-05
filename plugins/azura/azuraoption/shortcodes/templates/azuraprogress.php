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
   'speed'=>'2000',
   'anivalue'=>'50',
   'layout'=>''
), $atts));

$classes = "azp_progress ui-container";

$animation_data = self::buildAnimation($atts,'animate');

$classes .= ' '.$animation_data['trigger'];
$animationData = $animation_data['data'];

$progressstyle = self::buildStyle($atts);

$classes .= ' ui-progress-bar'.strtolower($type);

$wrapper_class = 'progress-wrapper';

if(!empty($class)){
	$wrapper_class .= ' '.$class;
}

$classes = 'class="'.$classes.'"';
 
if(!empty($id)){
	$id = 'id="'.$id.'"';
}

$prodata = 'data-value="'.$value.'" data-anivalue="'.$anivalue.'" data-speed="'.(int)$speed.'"';

?>

<div class="<?php echo $wrapper_class;?>" <?php echo $progressstyle;?>>
   <h6><?php echo $title;?></h6>
   <div <?php echo $id.' '.$classes;?>>
   <div class="ui-progress ui-progress<?php echo $type;?>" <?php echo $prodata;?>><span class="ui-label"><b class="value"><?php echo $value;?>%</b></span></div>
   </div>
</div>
<div class="clearfix"></div>

