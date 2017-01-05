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

<?php if(count($clientsSliderItemsArray)) : ?>
    <div <?php echo $clientssliderstyle; ?> class="owl-carousel navigation-1" data-items="<?php echo $items ; ?>" data-pagination="<?php echo $pagination === '1' ? 'true':'false'; ?>" data-autoplay="<?php echo $autoplay === '1' ? 'true':'false'; ?>" data-navigation="<?php echo $navigation === '1' ? 'true':'false'; ?>">
    <?php foreach ($clientsSliderItemsArray as $key => $item) :?>
    <a href="<?php echo $item['link']; ?>">
        <img src="<?php echo JURI::root(true).'/'.$item['logo']; ?>" width="<?php echo $itemwidth; ?>" height="<?php echo $itemheight; ?>" alt="" />
    </a>
    <?php endforeach; ?> 
    </div>
<?php endif;?>
