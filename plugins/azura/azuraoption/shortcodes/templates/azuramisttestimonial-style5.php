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
$coln = '';
if($items == 2)
    $coln = 'col-md-6 col-sm-6';
elseif($items == 3)
    $coln = 'col-md-4 col-sm-4';
?>
<?php if(count($testimonialItemsArray)) : ?>
    <div <?php echo $testimonialstyle; ?> class="owl-carousel pagination-1 dark-switch text-center" data-pagination="<?php echo $pagination === '1' ? 'true':'false'; ?>" data-autoplay="<?php echo $autoplay === '1' ? 'true':'false'; ?>" data-navigation="<?php echo $navigation === '1' ? 'true':'false'; ?>" <?php if($items > 1) echo 'data-items="'.$items.'"'; else echo 'data-singleitem="true"'; ?>>
    <?php foreach ($testimonialItemsArray as $key => $item) :?>
    <div class="item <?php echo $coln; ?>">
        <div class="client-box text-left">
            <div class="client-image">
                <img class="img-circle img-thumbnail" src="<?php echo $item['avatar']; ?>" width="80" height="80" alt="" />
            </div>
            <p>
                <?php echo ElementParser::do_shortcode($item['content'] ); ?>
            </p>
            <div class="client-details">
                <!-- Name -->
                <strong class="text-color"><?php echo $item['name']; ?></strong> 
                <!-- Company -->
                <span><?php echo $item['position']; ?></span>
            </div>
        </div>
    </div>
    <?php endforeach; ?> 
    </div>
<?php endif;?>
