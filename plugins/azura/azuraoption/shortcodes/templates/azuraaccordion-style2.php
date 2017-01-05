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

$classes = 'linstar-accordion st-accordion-five';

$classes .= ' '.$animation_data['trigger'];

$animationData = $animation_data['data'];

if(!empty($class)){
    $classes .= ' '.$class;
}

$classes = 'class="'.$classes.'"';
 
if(empty($id)){
    $id = uniqid();
}

$dataObj = new stdClass;
if($acctype === 'accordion'){
    $dataObj->oneOpenedItem = true;
}else{
    $dataObj->oneOpenedItem = false;
}
if($defaultactive === '-1'){
    //$dataObj->oneOpenedItem = false;
    $dataObj->open = -1;
}else{
    //$dataObj->oneOpenedItem = true;
    $dataObj->open = (int)$defaultactive - 1;
}
$dataObj = rawurlencode(json_encode($dataObj));

?>

<?php if(count($accordionItemsArray)) :?>
<div id="<?php echo $id;?>" <?php echo $classes;?> <?php echo $accordionstyle.' '.$animationData;?> data-options="<?php echo $dataObj;?>">
        
    <ul>
    <?php foreach ($accordionItemsArray as $key => $item) : ?>
        <li class="acc-<?php echo ($key+1);?> <?php echo $item['class'];?>">
            <a href="#"><?php echo $item['title'];?><span class="st-arrow">Open or Close</span></a>
            <div class="st-content">
                <?php echo $item['content'];?>
            </div>
        </li>
    
    <?php endforeach;?>

    </ul>
</div>

<?php endif;?>

