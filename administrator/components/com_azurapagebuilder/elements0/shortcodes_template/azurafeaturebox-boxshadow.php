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

$classes = "featurebox_boxshadow";

$animation_data = self::buildAnimation($atts,'animate');

$classes .= ' '.$animation_data['trigger'];
$animationData = $animation_data['data'];

$featureboxstyle = self::buildStyle($atts);

// $animationData = '';
// if($animationArgs['animation'] == '1'){
// 	$classes .= ' animate';
// 	$animationData = 'data-anim-type="'.$animationArgs['animationtype'].'" data-anim-delay="'.$animationArgs['animationdelay'].'"';
// }

if(!empty($extraclass)){
	$classes .= ' '.$extraclass;
}
if($isactive === '1'){
    $classes .= ' active';
}
$classes = 'class="'.$classes.'"';

?>
<div <?php echo $classes.' '.$featureboxstyle.' '.$animationData;?>>
    <div class="boxshadow">
        <?php if(!empty($image)) :?>
            <img src="<?php echo JURI::root(true).'/'.$image;?>" class="responsive-img" alt="<?php echo $title;?>">
        <?php endif;?> 
        <?php if(!empty($title)) :?>    
        <h5><strong><?php echo $title;?></strong></h5>
        <?php endif;?>
        <?php echo $content;?>
    </div>
    <div class="smshadow"></div>
</div>