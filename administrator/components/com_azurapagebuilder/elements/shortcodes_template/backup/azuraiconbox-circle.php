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
$classes = "azp_iconbox iconbox_circle";

$animationData = '';
if($animationArgs['animation'] == '1'){
	//$classes .= ' animate-in';
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

<div <?php echo $classes.' '.$iconboxstyle;?>>
<?php if(!empty($link)) :?>
    <a href="<?php echo $link;?>">          
<?php else :?>
    <a href="javascript:void(0);">  
<?php endif;?>
    <div class="circle animate-in" <?php echo $animationData;?>>
        <?php if(!empty($iconclass)) :?>
            <i class="<?php echo $iconclass;?>"></i>
        <?php elseif(!empty($image)) :?>
            <img src="<?php echo JURI::root(true).'/'.$image;?>" class="hoxa-img-icon" alt="<?php echo $title;?>">
        <?php endif;?>
    </div>
    
    <?php if(!empty($title)) :?>
    <strong><?php echo $title;?></strong>
    <?php endif;?>
    <?php echo $content;?>
  
    </a>
</div>