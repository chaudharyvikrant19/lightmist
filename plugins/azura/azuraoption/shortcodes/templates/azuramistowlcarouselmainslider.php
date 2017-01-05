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

$classes = "owl-carousel custom-styles";

$classes .= ' '.$animation_data['trigger'];

$animationData = $animation_data['data'];

if(!empty($class)){
	$classes .= ' '.$class;
}

$classes = 'class="'.$classes.'"';

?>
<div class="clearfix"></div>
<section class="slider">
    <div id="main-slider">
        <div id="<?php echo $id; ?>" <?php echo $classes; ?> data-autoplay="true" <?php if($animate !== 'slide'): ?>data-effect="<?php echo $animate; ?>" <?php endif; ?> data-items="1" data-pagination="false" data-navigation="true">
            <?php foreach ($owlCarouselMainSliderItemsArray as $key => $owl) :?>
            <div class="item">
                <a href="#">
                    <?php if(!empty($owl['content'])): ?>
                    <div class="carousel-caption">
                        <?php echo $owl['content']; ?>
                    </div>
                    <?php endif; ?>
                    <img src="<?php echo $owl['img']; ?>" alt="" />
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<script type="text/javascript">
jQuery(function($){
    $("#<?php echo $id; ?>").owlCarousel({
      <?php if($animate !== 'slide'): ?>
      transitionStyle : "<?php echo $animate; ?>",
      <?php endif; ?>
      autoPlay: 3000, //Set AutoPlay to 3 seconds
      items : 1,
      itemsDesktop : 1, //5 items between 1000px and 901px
      itemsDesktopSmall : 1, // betweem 900px and 601px
      itemsTablet: 1, //2 items between 600 and 0
      itemsMobile : 1, // itemsMobile disabled - inherit from itemsTablet option

      navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
 
  });
});

</script>