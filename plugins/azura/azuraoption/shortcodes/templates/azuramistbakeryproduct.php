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
    'img' => '',
    'width' => '',
    'height' => '',
    'name' => '',
    'price' => '',
    'btn' => '',
    'link' => '',
    'layout'=>''
), $atts));

$classes = "product-item bakery";

$animation_data = self::buildAnimation($atts,'animate');

$classes .= ' '.$animation_data['trigger'];

$animationData = $animation_data['data'];

$bakeryproductstyle = self::buildStyle($atts);

if(!empty($class)){
    $classes .= ' '.$class;
}

$classes = 'class="'.$classes.'"';

?>
<div <?php echo $classes;?> <?php echo $animationData;?>>
    <div class="product-img">
        <img src="<?php echo JURI::root(true).'/'.$img;?>" alt="" width="<?php echo $width;?>" height="<?php echo $height;?>" />
        <a href="<?php echo $img;?>" data-rel="prettyPhoto[portfolio]">
        <i class="icon-magnifier bg-color text-white fa-2x icons-circle border-color"></i></a>
    </div>
    <!-- Product details-->
    <div class="product-details">
        <h4><?php echo $name;?></h4>
        <?php echo $price;?>
    </div>
    <a href="<?php echo $link;?>" class="btn btn-default btn-block"><?php echo $btn;?></a>
</div>