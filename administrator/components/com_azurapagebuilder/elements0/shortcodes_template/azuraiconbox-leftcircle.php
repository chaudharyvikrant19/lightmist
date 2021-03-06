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
$classes = "azp_iconbox iconbox_leftcircle";

$animationData = '';
if($animationArgs['animation'] == '1'){
	$classes .= ' animate';
	$animationData = 'data-anim-type="'.$animationArgs['animationtype'].'" data-anim-delay="'.$animationArgs['animationdelay'].'"';
}

if(!empty($extraclass)){
	$classes .= ' '.$extraclass;
}
if($isactive === '1'){$classes .= ' active';}

$classes = 'class="'.$classes.'"';

?>
<div <?php echo $classes.' '.$iconboxstyle.' '.$animationData;?>>
    <?php if(!empty($iconclass)) :?>
        <i class="<?php echo $iconclass;?>"></i>
    <?php elseif(!empty($image)) :?>
        <img src="<?php echo JURI::root(true).'/'.$image;?>" class="linstar-img-icon" alt="<?php echo $title;?>">
    <?php endif;?>
            
    
    <?php if(!empty($title)) :?>
    <h4><?php echo $title;?></h4>
    <?php endif;?>
    <?php echo $content;?>

</div>