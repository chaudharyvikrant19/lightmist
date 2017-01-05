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

global $tabsItemsArray;

//ElementParser::do_shortcode($content);

if($id){
    $id = 'id="'.$id.'"';
}

$classes = 'linstar_tabs';

$animationData = '';
if($animationArgs['animation'] == '1'){
    $classes .= ' animate';
    $animationData = 'data-anim-type="'.$animationArgs['animationtype'].'" data-anim-delay="'.$animationArgs['animationdelay'].'"'; 
}

// if ($class) {
//     $classes .= ' '.$class;
// }

if(!empty($classes)){
    $classes = 'class="'.$classes.'"';
}
// if(is_int((int)$defaultactive)){
//     $defaultactive = (int)$defaultactive;
// }else{
//     $defaultactive = 1;
// }

?>
<div <?php echo $classes .' '.$tabsstyle.' '.$animationData;?>>
    <ul class="tabs3 <?php echo $class;?>">
    <?php foreach ($tabsItemsArray as $key => $tab) :?>
        <li>
            <a href="#<?php echo !empty($tab['id'])? $tab['id'] : ElementParser::slug($tab['title']);?>" target="_self"><?php echo $tab['title'];?></a>
        </li>
    <?php endforeach;?>
    </ul>
     
    <div class="tabs-content3 <?php echo $class;?>">
        <?php foreach ($tabsItemsArray as $key => $tab) :?>
            <div id="<?php echo !empty($tab['id'])? $tab['id'] : ElementParser::slug($tab['title']);?>" class="tabs-panel3">
                <?php echo $tab['content']; ?>
            </div>
        <?php endforeach;?>

    </div><!-- end all tabs -->
</div>



