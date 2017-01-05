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
$coln = '';$itm = 1;
if($items == 2){
    $itm = 2;
    $coln = 'col-md-6 col-sm-6';
}
elseif($items == 3){
    $itm = 3;
    $coln = 'col-md-4 col-sm-4';
}


?>
<?php if(count($testimonialItemsArray)) : ?>
    <div <?php echo $testimonialstyle; ?>>
    <?php foreach ($testimonialItemsArray as $key => $item) :?>
    <div class="item <?php echo $coln; ?>">
        <div class="no-border">
            <blockquote class="small-text"><?php echo ElementParser::do_shortcode($item['content'] ); ?></blockquote>
            <div class="star-rating text-center">
            <i class="fa fa-star text-color"></i> 
            <i class="fa fa-star text-color"></i> 
            <i class="fa fa-star text-color"></i> 
            <i class="fa fa-star text-color"></i> 
            <i class="fa fa-star-half-o text-color"></i></div>
        </div>
        <div class="client-details text-center">
            <div class="client-image">
                <!-- Image -->
                <img class="img-circle" src="<?php echo $item['avatar']; ?>" width="80" height="80" alt="" />
            </div>
            <div class="client-details">
            <!-- Name -->
            <strong class="text-color"><?php echo $item['name']; ?></strong> 
            <!-- Company -->
             
            <span><?php echo $item['position']; ?></span></div>
        </div>
    </div>
    <?php if(($key+1) == $itm ) break;?>
    <?php endforeach; ?> 
    </div>
<?php endif;?>
