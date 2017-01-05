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

<?php if(count($processBarItemsArray)) : ?>
    <div <?php echo $processbarstyle; ?> class="<?php echo $class; ?>">
    <?php foreach ($processBarItemsArray as $key => $item) :?>
        <h6><?php echo $item['name']; ?></h6>
        <div class="progress">
            <div data-percentage="<?php echo $item['percent']; ?>" aria-valuemax="100" aria-valuemin="0" aria-valuenow="<?php echo $item['percent']; ?>" role="progressbar" class="progress-bar">
                <span class="progress-label" style="left: <?php echo $item['percent']; ?>%"><?php echo $item['percent']; ?>%</span>
            </div>
        </div>
    <?php endforeach; ?> 
    </div>
<?php endif;?>
