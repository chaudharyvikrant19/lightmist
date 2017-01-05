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
<?php if(count($bakeryHeaderItemsArray)) : ?>
	<ul <?php echo $bakeryheaderstyle; ?> class="nav nav-tabs" role="tablist">
    <?php foreach ($bakeryHeaderItemsArray as $key => $item) :?>
    <li role="presentation"<?php if($item['isactive'] == '1') echo ' class="active"' ;?>>
    	<a href="#<?php echo $item['childid']; ?>" aria-controls="<?php echo $item['childid']; ?>" role="tab" data-toggle="tab"><?php echo $item['tabname']; ?><i class="<?php echo $item['icon']; ?> fa-3x icons-circle"></i></a>
    </li>
    <?php endforeach; ?> 
    </ul>
<?php endif;?>