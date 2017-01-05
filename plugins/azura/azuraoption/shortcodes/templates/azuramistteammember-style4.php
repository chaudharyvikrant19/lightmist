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

<?php if(count($teamMemberItemsArray)) : ?>
<?php if($useslider == '1'): ?>
    <div <?php echo $teammemberstyle; ?> class="owl-carousel white pagination-1 light-switch text-center" data-pagination="<?php echo $pagination === '1' ? 'true':'false'; ?>" data-autoplay="<?php echo $autoplay === '1' ? 'true':'false'; ?>" data-navigation="<?php echo $navigation === '1' ? 'true':'false'; ?>" data-items="<?php echo $items; ?>">
<?php else: ?>
    <div <?php echo $teammemberstyle; ?>>
<?php endif; ?>
        <?php foreach ($teamMemberItemsArray as $key => $item) :?>
        <div class="item">
            <div class="client-image">
                <!-- Image -->
                <img class="img-circle" width="80" height="80" title="" alt="" src="<?php echo $item['avatar']; ?>">
            </div>
            <div class="client-details text-center">
                <p><?php echo $item['description']; ?></p>
                <div class="client-details">
                <!-- Name -->
                <strong class="text-color"><?php echo $item['name']; ?></strong> 
                <!-- Company -->
                 
                <span><?php echo $item['position']; ?></span></div>
            </div>
        </div> 
        <?php endforeach; ?> 
    </div>
<?php endif;?>
