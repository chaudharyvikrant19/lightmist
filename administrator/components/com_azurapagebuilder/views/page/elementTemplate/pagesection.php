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
<div class="azura-element-block pagebuilder-section pagesection" data-typeName="<?php echo $element->type;?>">
	<div class="section-header clearfix">
		<div class="pull-left">
			<a class="move-icon" href="javascript:void(0)"><i class="fa fa-arrows"></i></a>
		<?php if($element->hasonechild === 'no'&& $element->hasownchild === 'yes') :?>
			<div class="azura-row-layout">
				<a class="columns-layout" href="javascript:void(0)"><i class="fa fa-plus"></i> Section Layout</a>
				<ul>
					<li><a class="sec-set-width l_1" data-layout="11" href="#" title="1"></a></li>
					<li><a class="sec-set-width l_12_12" href="#" data-layout="12_12" title="1/2+1/2"></a></li>
					<li><a class="sec-set-width l_23_13" href="#" data-layout="23_13" title="2/3+1/3"></a></li>
					<li><a class="sec-set-width l_13_13_13" href="#" data-layout="13_13_13" title="1/3+1/3+1/3"></a></li>
					<li><a class="sec-set-width l_14_14_14_14" href="#" data-layout="14_14_14_14" title="1/4+1/4+1/4+1/4"></a></li>
					<li><a class="sec-set-width l_14_34" href="#" data-layout="14_34" title="1/4+3/4"></a></li>
					<li><a class="sec-set-width l_14_12_14" href="#" data-layout="14_12_14" title="1/4+1/2+1/4"></a></li>
					<li><a class="sec-set-width l_56_16" href="#" data-layout="56_16" title="5/6+1/6"></a></li>
					<li><a class="sec-set-width l_16_16_16_16_16_16" data-layout="16_16_16_16_16_16" href="#" title="1/6+1/6+1/6+1/6+1/6+1/6"></a></li>
					<li><a class="sec-set-width l_16_46_16" data-layout="16_46_16" href="#" title="1/6+4/6+1/6"></a></li>
					<li><a class="sec-set-width l_16_16_16_12" data-layout="16_16_16_12" href="#" title="1/6+1/6+1/6+1/2"></a></li>
					<li class="custom">
						<ul>
							<li>Custom Layout</li>
							<li>&nbsp;&nbsp;&nbsp;<input type="text" class="set-width-column inputbox" placeholder="5/12+7/12 or 1/5+4/5"></li>
							<li>&nbsp;&nbsp;&nbsp;<button class="btn btn-small set-sec-width-custom-button">Set</button></li>
						</ul>
					</li>
				</ul>
				
			</div>
		<?php endif;?>
			<div class="azura-row-title"><?php //echo $element->elementTypeName;?><?php if(!empty($element->name)) echo $element->name;?></div>
		</div>
		
		
		<div class="azura-element-tools pull-right">
			<!-- <i class="fa fa-arrow-up azura-element-tools-levelup"></i>

			<i class="fa fa-eye azura-element-tools-showhide <?php echo $this->elements_expand;?>"></i> -->
			<a href="javascript:void(0)" class="sec-to-templates"><i class="fa fa-download"></i> Save to templates</a>
			<a href="javascript:void(0)" class="row-showhide"><i class="fa fa-chevron-up"></i></a>
			<a href="javascript:void(0)" class="row-configs"><i class="fa fa-cog"></i></a>
			<a  href="javascript:void(0)" class="row-duplicate"><i class="fa fa-copy"></i></a>
			<a  href="javascript:void(0)" class="row-delete"><i class="fa fa-times"></i></a>
			
		</div>

	</div>

	<div class="row"><?php if($element->hasownchild === 'yes') :?>	
		<?php
		if(count($element->children)) {
			foreach ($element->children as $child) {
				$this->parseElement($child);
			}
		}else{ ?>
			<div class="column-parent pagesection col-md-12"  data-typeName="<?php echo $element->childtypename;?>">
				<div class="section-item">
                    <h3>Section Item</h3>

                    <div class="azura-element-tools">
                        <a href="javascrip:void(0)" class="sec-child-configs"><i class="fa fa-pencil"></i></a>
                        <a href="javascrip:void(0)" class="sec-child-copy"><i class="fa fa-copy"></i></a>
                        <a href="javascrip:void(0)" class="sec-child-remove"><i class="fa fa-times"></i></a>
                    </div>

                </div>

                <div class="azura-element-settings-saved saved" data="<?php echo rawurlencode('{"type":"'.$element->childtypename.'","ispagesectionitem": true ,"parenttypename": "'.$element->type.'","id": "0","published":"1","language":"*", "content":"","attrs":{"columnwidthclass":"col-md-12"}}');?>"></div>
			</div>
		<?php } ?>
	<?php endif;?></div>
	<?php
		$storedData = $element;
		unset($storedData->children); ?>

	<div class="azura-element-settings-saved saved" data="<?php echo rawurlencode(json_encode($storedData));?>"></div>

</div>
