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
	<div class="azura-element-wrapper azura-element-type-<?php echo strtolower($element->type);?>">

		<span class="azura-element-title"><?php echo $element->elementTypeName;?><?php if(!empty($element->name)) echo ' - '.$element->name;?></span>

		<div class="azura-element-tools">
			<i class="fa fa-edit azura-element-tools-configs"></i>
			<i class="fa fa-copy azura-element-tools-copy"></i>
			<i class="fa fa-times azura-element-tools-remove"></i>
		</div>

	</div>

	<?php
		$storedData = $element;
		unset($storedData->children);

	 //echo'<pre>';var_dump($storedData);die;?>

	<div class="azura-element-settings-saved saved" data="<?php echo rawurlencode(json_encode($storedData));?>"></div>
	
</div>
