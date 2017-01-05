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
<?php if(count($bakeryMenuItemsArray)) : 
$count = 0;
$row   = 0;
if(count($bakeryMenuItemsArray) % 2 == 0) $row = count($bakeryMenuItemsArray)/2;
else $row = count($bakeryMenuItemsArray)/2 + 1;
?>
<div <?php echo $bakerymenustyle; ?> role="tabpanel" class="tab-pane<?php if($isactive == '1')echo ' active'; ?>" id="<?php echo $id; ?>">
	<?php foreach ($bakeryMenuItemsArray as $key => $item) : $n = $key+1;?>
	<?php if($n%2 != 0): $count += 1; ?>
		<?php if($row == $count): ?>
    	<div class="row last-row">
    	<?php else: ?>
    	<div class="row">
    	<?php endif; ?>
    <?php endif; ?>
        <!-- List -->
        <div class="col-md-6">
            <div class="col-xs-2">
                <img src="<?php echo $item['img']; ?>" alt="" class="img-responsive img-circle">
            </div>
            <!-- Menu Details -->
            <div class="menu-items col-xs-10">
                <h5><a href="#"><?php echo $item['menuname']; ?></a></h5>
                <p><?php echo $item['description']; ?></p>
                <p class="text-color"><strong><?php echo $item['menuprice']; ?></strong></p>
            </div>
        </div>
    <?php if($n%2 == 0 or ($n%2 != 0 and $row == $count and $n == count($bakeryMenuItemsArray))): ?>
    </div>
    <?php endif; ?>
    <?php endforeach; ?> 
</div>
<?php endif;?>