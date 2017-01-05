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

$classes = "section-title";

$titleclass = 'title';

$classes .= ' '.$animation_data['trigger'];

$animationData = $animation_data['data'];

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
<?php if(count($whoWeAreItemsArray)) : ?>
    <div <?php echo $whoweareslidestyle; ?> class="owl-carousel pagination-1 dark-switch" data-pagination="true" data-autoplay="true" data-navigation="false" data-singleitem="true">
    <?php foreach ($whoWeAreItemsArray as $key => $item) :?>
    <div class="item">
        <?php echo ElementParser::do_shortcode($item['content'] ); ?>
    </div>
    <?php endforeach; ?> 
    </div>  
<?php endif;?>
