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

<?php if(count($screenshotsItemsArray)) : ?>
    <div <?php echo $screenshotsstyle; ?> class="owl-carousel white pagination-1 light-switch text-center" data-pagination="<?php echo $pagination === '1' ? 'true':'false'; ?>" data-autoplay="<?php echo $autoplay === '1' ? 'true':'false'; ?>" data-navigation="<?php echo $navigation === '1' ? 'true':'false'; ?>" data-items="<?php echo $items; ?>">
    <?php foreach ($screenshotsItemsArray as $key => $item) :?>
    <div class="item col-md-3">
        <img alt="" src="<?php echo $item['img']; ?>" height="570" width="320">
    </div>
    <?php endforeach; ?> 
    </div>
<?php endif;?>
