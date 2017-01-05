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

$classes = "carousel slide";

$classes .= ' '.$animation_data['trigger'];

$animationData = $animation_data['data'];

if(!empty($class)){
	$classes .= ' '.$class;
}

$classes = 'class="'.$classes.'"';

?>
<div <?php echo $classes; ?> id="<?php echo $id; ?>" data-ride="carousel">
<?php if(count($carouselItemsArray)) : ?>	
    <!-- Indicators -->
    <ol class="carousel-indicators">
		<?php foreach ($carouselItemsArray as $key => $owl) :?>
        <li data-target="#<?php echo $id; ?>" data-slide-to="<?php echo $key; ?>" <?php if($key==0) echo 'class="active"'; ?>></li>
        <?php endforeach; ?>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
    	<?php foreach ($carouselItemsArray as $key => $owl) :?>
        <div class="item <?php if($key==0) echo 'active'; ?>">
            <img src="<?php echo $owl['img']; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" alt="" title="" />
            <?php if(!empty($owl['caption'])): ?>
            <div class="carousel-caption">
                <h2><?php echo $owl['caption']; ?></h2>
            </div>
        	<?php endif; ?>
        </div>
        <?php endforeach; ?>	
		
    </div>
    <!-- Controls -->
    <a class="left carousel-control" href="#<?php echo $id; ?>" role="button" data-slide="prev">
    <span class="fa fa-angle-left fa-2x" aria-hidden="true"></span> 
    <span class="sr-only"><?php echo JText::_('TPL_MIST_PREVIOUS'); ?></span></a> 
    <a class="right carousel-control" href="#<?php echo $id; ?>" role="button" data-slide="next">
    <span class="fa fa-angle-right fa-2x" aria-hidden="true"></span> 
    <span class="sr-only"><?php echo JText::_('TPL_MIST_NEXT'); ?></span></a>
<?php endif;?>
</div>