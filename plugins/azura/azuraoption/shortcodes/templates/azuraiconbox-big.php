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
extract(cth_shortcode_atts(array(
     'iconclass' => '',
     'image' => '',
     'title'=>'',
     'link'=>'',
     'isactive'=>'0',
     'extraclass'=>'',
     'layout'=>''
), $atts));

$classes = "azp_iconbox iconbox_big";

$animation_data = self::buildAnimation($atts,'animate');

$classes .= ' '.$animation_data['trigger'];
$animationData = $animation_data['data'];

$iconboxstyle = self::buildStyle($atts);

if(!empty($extraclass)){
	$classes .= ' '.$extraclass;
}
if($isactive === '1'){
    $classes .= ' active';
}
$classes = 'class="'.$classes.'"';

?>
<div <?php echo $classes.' '.$iconboxstyle.' '.$animationData;?>>

    <?php if(!empty($iconclass)) :?>
        <i class="<?php echo $iconclass;?>"></i>
    <?php elseif(!empty($image)) :?>
        <img src="<?php echo JURI::root(true).'/'.$image;?>" class="iconbox-big-icon" alt="<?php echo $title;?>">
    <?php endif;?>
    <?php if(!empty($title)) :?>
    <h2><?php echo $title;?></h2>
    <?php endif;?>
    <?php echo $content;?>
    <?php if(!empty($link)) :?>
    <!-- <a href="<?php echo $link;?>" target="_blank"><i class="fa fa-caret-right"></i> <?php echo JText::_('TPL_LINSTAR_READ_MORE_TEXT');?></a></li>           -->
    <?php endif;?>
</div>