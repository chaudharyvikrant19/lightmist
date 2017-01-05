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
    'titleclass'=>'title',
    'headertag'=>'',
    'layout'=>''
), $atts));

$classes = "section-title";

$titleclass = 'title';

$animation_data = self::buildAnimation($atts,'animate');

$classes .= ' '.$animation_data['trigger'];

$animationData = $animation_data['data'];

$misttitlestyle = self::buildStyle($atts);

if(!empty($class)){
    $classes .= ' '.$class;
}

if(!empty($extraclass)){
	$titleclass .= ' '.$extraclass;
}

$classes = 'class="'.$classes.'"';

?>

<div  <?php echo $classes;?> <?php echo $animationData;?>>
   <<?php echo $headertag; ?>> <?php echo $content;?></<?php echo $headertag; ?>>
</div>