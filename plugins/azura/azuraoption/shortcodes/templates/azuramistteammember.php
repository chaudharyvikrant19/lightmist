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
    <div <?php echo $teammemberstyle; ?> class="owl-carousel navigation-1" data-pagination="<?php echo $pagination === '1' ? 'true':'false'; ?>" data-autoplay="<?php echo $autoplay === '1' ? 'true':'false'; ?>" data-navigation="<?php echo $navigation === '1' ? 'true':'false'; ?>" data-items="<?php echo $items; ?>">
<?php else: ?>
    <div <?php echo $teammemberstyle; ?>>
<?php endif; ?>
        <?php foreach ($teamMemberItemsArray as $key => $item) :?>
        <div class="col-sm-4 col-md-3 icons-hover-color bottom-xs-pad-20">
            <div class="image">
                <!-- Image -->
                <img width="270" height="270" title="" alt="" src="<?php echo $item['avatar']; ?>">
            </div>
            <div class="description">
                <!-- Name -->
                <h4 class="name text-color"><?php echo $item['name']; ?></h4>
                <!-- Designation -->
                <div class="role"><?php echo $item['position']; ?></div>
                <!-- Text -->
                <p><?php echo $item['description']; ?></p>
            </div>
            <div class="social-icon i-3x">
                <?php echo ElementParser::do_shortcode($item['content'] ); ?>
            </div>
        </div> 
        <?php endforeach; ?> 
    </div>
<?php endif;?>
