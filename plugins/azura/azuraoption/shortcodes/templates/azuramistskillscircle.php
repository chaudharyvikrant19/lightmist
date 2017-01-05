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
    'class' => '',
    'name' => '',
    'size'=>'',
    'linewidth'=>'',
    'trackcolor'=>'',
    'barcolor'=>'',
    'percent'=>'',
    'layout'=>''
), $atts));

$classes = "piechart";

$animation_data = self::buildAnimation($atts,'animate');

$classes .= ' '.$animation_data['trigger'];

$animationData = $animation_data['data'];

$skillscirclestyle = self::buildStyle($atts);

if(!empty($class)){
    $classes .= ' '.$class;
}

$classes = 'class="'.$classes.'"';

?>
<div data-size="<?php echo $size;?>" data-linewidth="<?php echo $linewidth;?>" data-trackcolor="<?php echo $trackcolor;?>" data-barcolor="<?php echo $barcolor;?>" data-percent="<?php echo $percent;?>" <?php echo $classes;?> <?php echo $animationData;?>>
    <span><?php echo $percent;?></span>
    <canvas height="<?php echo $size;?>" width="<?php echo $size;?>"></canvas>
</div>
<h5 class="text-color"><?php echo $name;?></h5>