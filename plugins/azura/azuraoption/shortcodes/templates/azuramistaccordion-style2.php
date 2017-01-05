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

$classes = 'panel-group';

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
<div <?php echo $classes;?> id="<?php echo $id;?>" role="tablist" aria-multiselectable="true" <?php echo $accordionstyle.' '.$animationData;?>>
    <?php foreach ($accordionItemsArray as $key => $item) : ?>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="heading<?php echo $key;?>">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion-faq<?php echo $key;?>" href="#faq<?php echo $key;?>" aria-expanded="true" aria-controls="faq<?php echo $key;?>">
                <?php echo $item['title'];?>
                </a>
            </h4>
        </div>
        <div id="faq<?php echo $key;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $key;?>">
            <div class="panel-body">
                <?php echo $item['content'];?>
            </div>
        </div>
    </div>
    <?php endforeach;?>
</div>
<?php endif;?>

