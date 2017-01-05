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
    'offer' => '',
    'title' => '',
    'starting' => '',
    'pricebox'=>'',
    'img'=>'',
    'width'=>'',
    'height'=>'',
    'btn'=>'',
    'link'=>'',
    'layout'=>''
), $atts));

$classes = "pricing";

$animation_data = self::buildAnimation($atts,'animate');

$classes .= ' '.$animation_data['trigger'];

$animationData = $animation_data['data'];

$pricingstyle = self::buildStyle($atts);

if(!empty($class)){
    $classes .= ' '.$class;
}

$classes = 'class="'.$classes.'"';

?>
<div <?php echo $classes;?> <?php echo $animationData;?> >
    <?php if(!empty($offer)) : ?>
    <div class="ribbon-wrapper">
        <div class="ribbon yellow"><?php echo $offer; ?></div>
    </div>
    <?php endif; ?>
    <div class="title">
        <a href="#"><?php echo $title; ?></a>
    </div>
    <div class="price-box">
    	<?php if(!empty($starting)) : ?>
    	<div class="starting"><?php echo $starting; ?></div>
    	<?php endif; ?>
        <div class="price"><?php echo $pricebox; ?></div>
    </div>
    <?php if(!empty($img)): ?>
    <div>
        <img width="<?php echo $width; ?>" height="<?php echo $height; ?>" src="<?php echo JURI::root(true).'/'.$img; ?>" alt="" />
    </div>
	<?php endif; ?>
    <?php echo $content; ?>
    <div class="btn-box">
        <div class="clearfix"></div>
        <a href="<?php echo $link; ?>" class="btn btn-default btn-block"><?php echo $btn; ?></a>
    </div>
</div>