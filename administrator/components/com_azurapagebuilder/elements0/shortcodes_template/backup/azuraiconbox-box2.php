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
$classes = "azp_iconbox fullimage_box2";

$animationData = '';
if($animationArgs['animation'] == '1'){
	$classes .= ' animate-in';
	$animationData = 'data-anim-type="'.$animationArgs['animationtype'].'" data-anim-delay="'.$animationArgs['animationdelay'].'"';
}

if(!empty($extraclass)){
	$classes .= ' '.$extraclass;
}
if($isactive === '1'){
    $classes .= ' active';
}
$classes = 'class="'.$classes.'"';

?>
<ul <?php echo $classes.' '.$iconboxstyle.' '.$animationData;?>>
    <?php if(!empty($iconclass)) :?>
        <li><i class="<?php echo $iconclass;?>"></i></li>
    <?php elseif(!empty($image)) :?>
        <li><img src="<?php echo JURI::root(true).'/'.$image;?>" class="hoxa-img-icon" alt="<?php echo $title;?>"></li>
    <?php endif;?>
    <?php if(!empty($title)) :?>
    <li><h4><?php echo $title;?></h4></li>
    <?php endif;?>
    <li><?php echo $content;?></li>
    <?php if(!empty($link)) :?>
    <li><a href="<?php echo $link;?>"><?php echo JText::_('TPL_HOXA_READ_MORE_TEXT');?></a></li>          
    <?php endif;?>
</ul>