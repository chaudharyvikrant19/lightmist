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
$classes = "azp_iconbox iconbox_service";

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
        <li class="icon"><i class="<?php echo $iconclass;?>"></i></li>
    <?php elseif(!empty($image)) :?>
        <li class="icon"><img src="<?php echo JURI::root(true).'/'.$image;?>" class="hoxa-img-icon" alt="<?php echo $title;?>"></li>
    <?php endif;?>
    <li class="text">
        <?php if(!empty($title)) :?>
            <h4><?php echo $title;?></h4>
        <?php endif;?>
        <?php echo $content;?>
        <br>
    <?php if(!empty($link)) :?>
        <a href="<?php echo $link;?>" class="lfive"><i class="fa fa-chevron-circle-right"></i>&nbsp; <?php echo JText::_('TPL_HOXA_READ_MORE_TEXT');?></a>
    <?php endif;?>
    </li>
    
</ul>
