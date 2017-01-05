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

?>
<?php if(count($masonryGridItemsArray)) : ?>
<div <?php echo $masonrygridstyle; ?> class="masonry-grid grid-col-<?php echo $cols; ?>" data-gutter="0">
    <div class="grid-sizer"></div>
    <?php foreach ($masonryGridItemsArray as $key => $item) :?>
    <div class="grid-item all web">
        <a href="<?php echo $item['img']; ?>" data-rel="prettyPhoto[portfolio]">
            <img src="<?php echo $item['img']; ?>" width="<?php echo $item['width']; ?>" height="<?php echo $item['height']; ?>" alt="Recent Work" class="img-responsive" />
            <div class="portfolio-title"><?php echo $item['title']; ?></div>
        </a>
    </div>
    <?php endforeach; ?> 
</div>
<?php endif;?>
