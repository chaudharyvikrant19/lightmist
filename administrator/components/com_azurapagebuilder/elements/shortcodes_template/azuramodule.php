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
	'id' => '',
	'extraclass' => '',
    'moduleid'=>'',
    'chromestyle'=>'none',
    'showtitle'=>'',
    'layout'=>''
), $atts));

if($moduleid == '0' || $moduleid =='') return false;

//echo'<pre>';var_dump($chromestyle);die; System-none

$module = ElementParser::loadModule($moduleid,$chromestyle);

$classes = 'azp_module';

$animation_data = self::buildAnimation($atts,'animate');

$classes .= ' '.$animation_data['trigger'];
$animationData = $animation_data['data'];

$modulestyle = self::buildStyle($atts);


if(!empty($extraclass)){
	$classes .= ' '.$extraclass;
}

$classes = 'class="'.$classes.'"';

?>
<div <?php echo (!empty($id)? 'id="'.$id.'"' : ''); ?> <?php echo $classes.' '.$modulestyle.' '.$animationData;?>>
	<?php if($showtitle) : ?>
		<h3><?php echo $module->title;?></h3>
	<?php endif;?>
	<?php echo $module->content;?>
</div>