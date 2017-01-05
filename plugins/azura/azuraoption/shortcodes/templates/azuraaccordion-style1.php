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

global $accordionItemsArray;
$classes = 'accrodation';

$classes .= ' '.$animation_data['trigger'];

$animationData = $animation_data['data'];

if(!empty($class)){
    $classes .= ' '.$class;
}

$classes = 'class="'.$classes.'"';
 
if(empty($id)){
    $id = uniqid();
}

if(is_int((int)$defaultactive)){
    $defaultactive = (int)$defaultactive;
}else{
    $defaultactive = 1;
}


?>

<?php if(count($accordionItemsArray)) :?>
<div id="<?php echo $id;?>" <?php echo $classes;?> <?php echo $accordionstyle.' '.$animationData;?>>
    <?php foreach ($accordionItemsArray as $key => $item) : ?>
    <span class="acc-trigger <?php if(($key+1) === $defaultactive) echo ' active';?>"><a href="#"><?php echo $item['title'];?></a></span>
    <div class="acc-container <?php echo $item['class'];?>">
        <div class="content">
        <?php echo $item['content'];?>
        </div>
    </div>
    
    <?php endforeach;?>
    
</div>

<?php endif;?>

