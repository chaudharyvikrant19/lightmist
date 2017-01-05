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

$classes = "slider";

$classes .= ' '.$animation_data['trigger'];

$animationData = $animation_data['data'];

if(!empty($class)){
	$classes .= ' '.$class;
}

$classes = 'class="'.$classes.'"';

?>
<section class="slider">
    <div id="<?php echo $id; ?>" <?php echo $classes; ?>>
        <div id="carousel-example-generic1" class="carousel slide" data-ride="carousel" data-pause="false">
            <!-- Wrapper for slides -->
            
            <div class="carousel-inner" role="listbox">
                <?php foreach ($carouselMainSliderItemsArray as $key => $owl) :?>
                <div class="item <?php if($key == 0) echo 'active'; ?>">
                    <img src="<?php echo $owl['img']; ?>" alt="" title="" <?php if(!empty($width)) echo ' width="'. $width.'"'; ?> <?php if(!empty($height)) echo  ' height="'. $height.'"'; ?>>
                    <?php if(!empty($owl['content'])): ?>
                    <div class="carousel-caption <?php echo $owl['captionclass']; ?>">
                        <?php echo $owl['content']; ?>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic1" role="button" data-slide="prev">
            <span class="fa fa-angle-left fa-2x" aria-hidden="true"></span>
            <span class="sr-only"><?php echo JText::_('TPL_MIST_PREVIOUS'); ?></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic1" role="button" data-slide="next">
            <span class="fa fa-angle-right fa-2x" aria-hidden="true"></span>
            <span class="sr-only"><?php echo JText::_('TPL_MIST_NEXT'); ?></span>
            </a>
        </div>
    </div>
</section>