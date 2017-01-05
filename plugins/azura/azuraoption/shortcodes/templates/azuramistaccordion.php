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

$classes = 'panel-group no-list';

$classes .= ' '.$animation_data['trigger'];

$animationData = $animation_data['data'];

if(!empty($class)){
    $classes .= ' '.$class;
}

$classes = 'class="'.$classes.'"';
 
if(empty($id)){
    $id = uniqid();
}

?>

<?php if(count($accordionItemsArray)) :?>
<div id="<?php echo $id;?>" <?php echo $classes;?> <?php echo $accordionstyle.' '.$animationData;?> >
    <?php foreach ($accordionItemsArray as $key => $item) : ?>
        <div class="panel panel-default<?php echo $item['active']==='1'?' active':'';?>">
            <div class="panel-heading">
                <div class="panel-title">
                    <!-- Tab -->
                    <a data-toggle="collapse" data-parent="#<?php echo $id;?>" href="#item<?php echo ($key+1);?>">
                    <?php if(!empty($item['icontitle'])): ?><i class="<?php echo $item['icontitle'];?>"></i><?php endif; ?> <?php echo $item['title'];?></a>
                </div>
            </div>
            <div id="item<?php echo ($key+1);?>" class="panel-collapse collapse<?php echo $item['active']==='1'?' in':'';?>">
                <div class="panel-body">
                <?php echo $item['content'];?>
                </div>
            </div>
        </div>
    <?php endforeach;?>
</div>
<?php endif;?>

