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
    'type'=>'divider_line',
    'extraclass' => '',
    'layout'=>''
), $atts));

$classes = 'clearfix '.$type;

$animation_data = self::buildAnimation($atts,'animate');

$classes .= ' '.$animation_data['trigger'];
$animationData = $animation_data['data'];

$dividerstyle = self::buildStyle($atts);


if(!empty($extraclass)){
  $classes .= ' '.$extraclass;
}
$classes = 'class="'.$classes.'"';

?>
<div <?php echo $classes.' '.$dividerstyle.' '.$animationData;?>></div>