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

$buttonstyle = self::buildStyle($atts);


$classes .= ' azura_'.$buttoncolor;

if(!empty($buttonsize)){
	$classes .= ' azura_'.$buttonsize;
}

$classes = 'class="'.$classes.'"';

if(!empty($target)) {
	$target = 'target="'.$target.'"';
}

?>
<?php if(!empty($url)):
	$url = 'href="'.$url.'"';
?>
<a <?php echo $id.' '.$classes.' '.$url.' '.$target.' '.$buttonstyle.' '.$animationData;?> >
	<?php echo $buttontext;?>
	<?php if(!empty($buttonicon)):?>
		&nbsp;<i class="<?php echo $buttonicon;?>"></i>
	<?php endif;?>
</a>
<?php else: ?>
	<button <?php echo $id.' '.$classes.' '.$buttonstyle.' '.$animationData;?>><?php echo $buttontext;?>
	<?php if(!empty($buttonicon)):?>
		&nbsp;<i class="<?php echo $buttonicon;?>"></i>
	<?php endif;?></button>
<?php endif;?>