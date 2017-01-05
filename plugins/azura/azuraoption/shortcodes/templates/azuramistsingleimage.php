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
    'img'=>'',
    'width'=>'',
    'height'=>'',
    'layout'=>''
), $atts));

$classes = "";

$animation_data = self::buildAnimation($atts,'animate');

$classes .= ' '.$animation_data['trigger'];

$animationData = $animation_data['data'];

$singleimagestyle = self::buildStyle($atts);

if(!empty($class)){
    $classes .= ' '.$class;
}

$classes = 'class="'.$classes.'"';

?>
<img <?php echo $classes.' '.$singleimagestyle;?> src="<?php echo JURI::root(true).'/'.$img; ?>" <?php if(!empty($width)) echo ' width="'.$width.'"' ?> <?php if(!empty($height)) echo ' height="'.$height.'"' ?> alt="image" />