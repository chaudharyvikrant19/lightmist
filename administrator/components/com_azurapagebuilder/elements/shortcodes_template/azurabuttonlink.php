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
	'id'=>'',
	'extraclass'=>'',
	'buttontext'=>'',
	'buttonicon'=>'',
	'url'=>'',
	'buttoncolor'=>'btn-default',
	'buttonsize'=>'',
	'target'=>'',
	'layout'=>''
), $atts));


if(!empty($id)) {
	$id = 'id="'.$id.'"';
}
$classes = 'azura_btn';

if(!empty($extraclass)) {
	$classes .= ' '.$extraclass;
}

$animation_data = self::buildAnimation($atts,'animate');

$classes .= ' '.$animation_data['trigger'];
$animationData = $animation_data['data'];

$buttonlinkstyle = self::buildStyle($atts);

$classes .= ' azura_'.$buttoncolor;

if(!empty($buttonsize)){
	$classes .= ' azura_'.$buttonsize;
}

$classes = 'class="'.$classes.'"';

if(!empty($target)) {
	$target = 'target="'.$target.'"';
}
if(!empty($url)){
	//echo'<pre>';var_dump($url);die;
	$url = 'href="'.JURI::root(true).'?Itemid='.$url.'"';
}

?>

<a <?php echo $id.' '.$classes.' '.$url.' '.$target.' '.$buttonlinkstyle.' '.$animationData;?> >
	<?php echo $buttontext;?>
	<?php if(!empty($buttonicon)):?>
		&nbsp;<i class="<?php echo $buttonicon;?>"></i>
	<?php endif;?>
</a>