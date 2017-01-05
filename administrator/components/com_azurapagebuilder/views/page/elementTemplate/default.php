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

$app = JFactory::getApplication();
?>
<div class="azura-element" data-typeName="<?php echo $element->type;?>">
	<div class="azura-element-wrapper azura-element-type-<?php echo strtolower($element->type);?> clearfix">
		<img class="element-icon" src="<?php echo JURI::root(true).'/media/com_azurapagebuilder/elements-icon/'. strtolower(substr($element->type, 5));?>-icon.png" alt="<?php echo strtolower(substr($element->type, 5));?>" width="24" height="24">
	<?php if($element->type == 'AzuraK2ItemView'||$element->type == 'AzuraWorkK2' || $element->type == 'AzuraMistK2CatView') :?>
		<h3>
		<?php if(!empty($element->name)) { echo ' - '.strip_tags($element->name);?>
		<?php } else {echo $azuraelements[$element->type]->name;}?></h3>
	<?php endif;?>
		<div class="azura-element-tools">
			<a href="javascrip:void(0)" class="element-configs"><i class="fa fa-pencil"></i></a>
			<a href="javascrip:void(0)" class="element-copy"><i class="fa fa-copy"></i></a>
			<a href="javascrip:void(0)" class="element-remove"><i class="fa fa-times"></i></a>
		</div>
	<?php if($element->type != 'AzuraK2ItemView'&& $element->type != 'AzuraWorkK2' && $element->type != 'AzuraMistK2CatView') ://&&$element->type != 'AzuraProgress'?>
		<?php 
		$attrsText = '';

		foreach ($element->attrs as $key => $value) {
			$attrsText .=(' '.$key.'="'.$value.'"');
		} ?>
		<div class="clearfix"></div>
		<div class="element-content-container">
			<?php echo ElementParser::do_shortcode( '['.$element->type.$attrsText.']'.$element->content.'[/'.$element->type.']' ); ?>
		</div>
	<?php endif;?>
	</div>
	<?php
		$storedData = $element;
		unset($storedData->children);?>
	<div class="azura-element-settings-saved saved" data="<?php echo rawurlencode(json_encode($storedData));?>"></div>
	
</div>
