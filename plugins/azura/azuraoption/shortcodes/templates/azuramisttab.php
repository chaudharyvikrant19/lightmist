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

$classes = 'tabs tabs-right tab-style';

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
<div  id="<?php echo $id;?>" <?php echo $classes;?> <?php echo $tabstyle.' '.$animationData;?>>
    <ul class="nav nav-tabs">
        <?php foreach ($tabItemsArray as $key => $item) : ?>
        <li class="<?php if($item['active'] == '1') echo ' active '; ?>">
            <a href="#<?php echo $item['id']; ?>" data-toggle="tab">
            <?php if(!empty($item['icontitle'])): ?><i class="<?php echo $item['icontitle']; ?>"></i><?php endif; ?> <?php echo $item['title']; ?></a>
        </li>
        <?php endforeach;?>
    </ul>
    <div class="tab-content">
        <?php foreach ($tabItemsArray as $key => $item) : ?>
        <div class="tab-pane <?php if($item['active'] == '1') echo ' active '; ?>fade in" id="<?php echo $item['id']; ?>">
            <div id="<?php echo 'law'.($key+1); ?>" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="<?php echo $item['img']; ?>" width="1920" height="640" alt="" title="" />
                        <div class="carousel-caption text-left">
                            <?php echo $item['content']; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach;?>
        <div class="clearfix"></div>
    </div>
</div>
<?php endif;?>

