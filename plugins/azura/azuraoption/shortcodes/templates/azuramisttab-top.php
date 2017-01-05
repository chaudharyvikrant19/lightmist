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

$classes = '';

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

<?php if(count($tabItemsArray)) :?>
<div role="tabpanel" id="<?php echo $id;?>" <?php echo $classes;?> <?php echo $tabstyle.' '.$animationData;?>>

    <ul class="nav nav-tabs" role="tablist">
        <?php foreach ($tabItemsArray as $key => $item) : ?>
        <li role="presentation" class="<?php if($item['active'] == '1') echo ' active '; ?>">
            <a href="#<?php echo $item['id']; ?>" aria-controls="<?php echo $item['id']; ?>" role="tab" data-toggle="tab">
            <?php if(!empty($item['icontitle'])): ?><i class="<?php echo $item['icontitle']; ?>"></i><?php endif; ?> <?php echo $item['title']; ?></a>
        </li>
        <?php endforeach;?>
    </ul>
    <div class="tab-content">
        <?php foreach ($tabItemsArray as $key => $item) : ?>
        <div role="tabpanel" class="tab-pane <?php if($item['active'] == '1') echo ' active '; ?>" id="<?php echo $item['id']; ?>">
            <?php echo $item['content']; ?>
        </div>
        <?php endforeach;?>
    </div>
</div>
<?php endif;?>

