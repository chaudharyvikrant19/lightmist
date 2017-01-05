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
    'name' => 'CTHthemes',
    'job'=>'Developer',
    'photo' => '',
    'imgwidth'=>'169',
    'imgheight'=>'212',
    'extraclass'=>'',
    'layout'=>''
), $atts));

$classes = "azp_team attbox";

$animation_data = self::buildAnimation($atts,'animate');

$classes .= ' '.$animation_data['trigger'];

$animationData = $animation_data['data'];

$teammemberstyle = self::buildStyle($atts);

if(!empty($extraclass)){
	$classes .= ' '.$extraclass;
}
// if($isactive === '1'){
//     $classes .= ' active';
// }
$classes = 'class="'.$classes.'"';

?>
<div  <?php echo $classes;?> <?php echo $animationData;?>>
    <div class="box">
        <?php if(!empty($photo)) :?>
            <img src="<?php echo JURI::root(true).'/'.$photo;?>" class="cirimg" alt="<?php echo $name;?>">
        <?php endif;?>
        
        <?php if(!empty($name)) :?>
        <h5><strong class="color"><?php echo $name;?></strong></h5>
        <?php endif;?>
        <?php if(!empty($job)) :?>
        <em><?php echo $job;?></em>
        <?php endif;?>
        
        <?php echo $content;?>
    </div>
    
</div>