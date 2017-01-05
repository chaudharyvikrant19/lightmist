<?php
/**
 *
 * Show the product details page
 *
 * @package	VirtueMart
 * @subpackage
 * @author Max Milbers, Eugen Stranz, Max Galt
 * @link http://www.virtuemart.net
 * @copyright Copyright (c) 2004 - 2014 VirtueMart Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * VirtueMart is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * @version $Id: default.php 8715 2015-02-17 08:45:23Z Milbo $
 */
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

/* Let's see if we found the product */
if (empty($this->product)) {
	echo vmText::_('COM_VIRTUEMART_PRODUCT_NOT_FOUND');
	echo '<br /><br />  ' . $this->continue_link_html;
	return;
}

echo shopFunctionsF::renderVmSubLayout('askrecomjs',array('product'=>$this->product));



if(vRequest::getInt('print',false)){ ?>
<body onload="javascript:print();">
<?php } ?>

<div class="productdetails-view productdetails  product-page">
	<div class="row">
		
		<?php
	    // Product Navigation
	    if (VmConfig::get('product_navigation', 1)) {
		?>
		<div class="col-lg-12 col-md-12">
	        <div class="product-neighbours">
		    <?php
		    if (!empty($this->product->neighbours ['previous'][0])) {
			$prev_link = JRoute::_('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $this->product->neighbours ['previous'][0] ['virtuemart_product_id'] . '&virtuemart_category_id=' . $this->product->virtuemart_category_id, FALSE);
			echo JHtml::_('link', $prev_link, $this->product->neighbours ['previous'][0]
				['product_name'], array('rel'=>'prev', 'class' => 'previous-page','data-dynamic-update' => '1'));
		    }
		    if (!empty($this->product->neighbours ['next'][0])) {
			$next_link = JRoute::_('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $this->product->neighbours ['next'][0] ['virtuemart_product_id'] . '&virtuemart_category_id=' . $this->product->virtuemart_category_id, FALSE);
			echo JHtml::_('link', $next_link, $this->product->neighbours ['next'][0] ['product_name'], array('rel'=>'next','class' => 'next-page','data-dynamic-update' => '1'));
		    }
		    ?>
	    	<div class="clear"></div>
	        </div>
	    </div>
	    <?php } // Product Navigation END
	    ?>

		<?php // Back To Category Button
		if ($this->product->virtuemart_category_id) {
			$catURL =  JRoute::_('index.php?option=com_virtuemart&view=category&virtuemart_category_id='.$this->product->virtuemart_category_id, FALSE);
			$categoryName = $this->product->category_name ;
		} else {
			$catURL =  JRoute::_('index.php?option=com_virtuemart');
			$categoryName = vmText::_('COM_VIRTUEMART_SHOP_HOME') ;
		}
		?>


		<div class="col-md-4 col-sm-6">
		    <!-- Preview images start //-->
			<div class="single-product">
				<?php if(count($this->product->images) > 0): ?>
				<img id="zoom-product" src="<?php echo $this->product->images[0]->file_url; ?>" width="500" height="600" data-zoom-image="<?php echo $this->product->images[0]->file_url; ?>" alt="<?php echo $this->product->images[0]->file_meta; ?>" />
	            <?php endif; ?>
	            <div id="zoom-product-thumb" class="zoom-product-thumb">
				<?php 
				$start_image = VmConfig::get('add_img_main', 1) ? 0 : 1;
				for ($i = $start_image; $i < count($this->product->images); $i++) {
					$image = $this->product->images[$i];
					?>
						<?php echo '<img class="zimg" id="img_0'.$i.'" alt="product-image" src="'. $image->file_url .'" />';?>
				<?php
				}
				?>
				</div>
			</div>
			
		</div>
		<div class="col-md-8 col-sm-6">
	        <div class="product-rating pull-right">
	            <div class="star-rating">
		            <?php echo shopFunctionsF::renderVmSubLayout('rating',array('showRating'=>$this->showRating,'product'=>$this->product)); ?>
		        </div>
	        </div>
	        <div class="price-details">
		        <?php echo shopFunctionsF::renderVmSubLayout('prices',array('product'=>$this->product,'currency'=>$this->currency)); ?>
		    </div>

	        <?php 
	        if (is_array($this->productDisplayShipments)) {
			    foreach ($this->productDisplayShipments as $productDisplayShipment) {
				echo $productDisplayShipment . '<br />';
			    }
			}
			if (is_array($this->productDisplayPayments)) {
			    foreach ($this->productDisplayPayments as $productDisplayPayment) {
				echo $productDisplayPayment . '<br />';
			    }
			} ?>
			<h2 class="margin-top-0"><?php echo $this->product->product_name ?></h2>
			<?php echo $this->product->event->afterDisplayTitle ;?>
			<?php
		    // PDF - Print - Email Icon
		    if (VmConfig::get('show_emailfriend') || VmConfig::get('show_printicon') || VmConfig::get('pdf_icon')) {
			?>
		        <div class="icons">
			    <?php

			    $link = 'index.php?tmpl=component&option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $this->product->virtuemart_product_id;

				echo $this->linkIcon($link . '&format=pdf', 'COM_VIRTUEMART_PDF', 'pdf_button', 'pdf_icon', false);
			    //echo $this->linkIcon($link . '&print=1', 'COM_VIRTUEMART_PRINT', 'printButton', 'show_printicon');
				echo $this->linkIcon($link . '&print=1', 'COM_VIRTUEMART_PRINT', 'printButton', 'show_printicon',false,true,false,'class="printModal"');
				$MailLink = 'index.php?option=com_virtuemart&view=productdetails&task=recommend&virtuemart_product_id=' . $this->product->virtuemart_product_id . '&virtuemart_category_id=' . $this->product->virtuemart_category_id . '&tmpl=component';
			    echo $this->linkIcon($MailLink, 'COM_VIRTUEMART_EMAIL', 'emailButton', 'show_emailfriend', false,true,false,'class="recommened-to-friend"');
			    ?>
		    	<div class="clear"></div>
		        </div>
		    <?php } // PDF - Print - Email Icon END
		    ?>

	    	<?php if (!empty($this->product->product_s_desc)): ?>
	    	<div class="description">
	    		<?php echo nl2br($this->product->product_s_desc); ?>
	    	</div>
	    	<?php endif; ?>
	    	<?php echo shopFunctionsF::renderVmSubLayout('customfields',array('product'=>$this->product,'position'=>'ontop')); ?>

	        <div class="product-regulator">
	        <?php
				echo shopFunctionsF::renderVmSubLayout('addtocart',array('product'=>$this->product));

				echo shopFunctionsF::renderVmSubLayout('stockhandle',array('product'=>$this->product));

				// Ask a question about this product
				if (VmConfig::get('ask_question', 0) == 1) {
					$askquestion_url = JRoute::_('index.php?option=com_virtuemart&view=productdetails&task=askquestion&virtuemart_product_id=' . $this->product->virtuemart_product_id . '&virtuemart_category_id=' . $this->product->virtuemart_category_id . '&tmpl=component', FALSE);
					?>
					<div class="ask-a-question">
						<div class="callforprice bold" href="#" rel="nofollow" ><?php echo vmText::_('COM_VIRTUEMART_PRODUCT_ENQUIRY_LBL') ?></div>
					</div>
				<?php
				}
				?>

				<?php
				// Manufacturer of the Product
				if (VmConfig::get('show_manufacturers', 1) && !empty($this->product->virtuemart_manufacturer_id)) {
				    echo $this->loadTemplate('manufacturer');
				}
			?>
	        </div>
	    </div>
	</div>
	<div class="row top-pad-80">
	    <div class="col-md-12">
	        <div role="tabpanel">
	            <!-- Nav tabs -->
	            <ul class="nav nav-tabs" role="tablist">
	                <li role="presentation" class="active">
	                    <a href="#home" aria-controls="home" role="tab" data-toggle="tab"><?php echo JTEXT::_('TPL_MIST_PRODUCT_DESCRIPTION_TEXT'); ?></a>
	                </li>
	                <li role="presentation">
                        <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><?php echo JTEXT::_('TPL_MIST_ADDITIONAL_INFO_TEXT'); ?></a>
                    </li>
	            </ul>
	            <!-- Tab panes -->
	            <div class="tab-content">
	                <div role="tabpanel" class="tab-pane active" id="home">
	                    <?php 
							if (!empty($this->product->product_desc))
								echo $this->product->product_desc; 
							else
								echo JTEXT::_('TPL_MIST_DESCRIPTION_IS_EMPTY_TEXT');
						?>
	                </div>
	                <div role="tabpanel" class="tab-pane" id="profile">
	                	<?php 
							echo shopFunctionsF::renderVmSubLayout('customfields',array('product'=>$this->product,'position'=>'normal'));

							echo shopFunctionsF::renderVmSubLayout('customfields',array('product'=>$this->product,'position'=>'onbot'));

						    echo shopFunctionsF::renderVmSubLayout('customfields',array('product'=>$this->product,'position'=>'related_products','class'=> 'plugin-container margin-top-70 related-products','customTitle' => true ));

							echo shopFunctionsF::renderVmSubLayout('customfields',array('product'=>$this->product,'position'=>'related_categories','class'=> 'product-related-categories'));
						?>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?php 
			echo $this->product->event->afterDisplayContent;
			echo $this->loadTemplate('reviews');
			//echo $this->loadTemplate('reviews');
			// Show child categories
			if (VmConfig::get('showCategory', 1)) {
				echo $this->loadTemplate('showcategory');
			}

			$j = 'jQuery(document).ready(function($) {
				Virtuemart.product(jQuery("form.product"));

				$("form.js-recalculate").each(function(){
					if ($(this).find(".product-fields").length && !$(this).find(".no-vm-bind").length) {
						var id= $(this).find(\'input[name="virtuemart_product_id[]"]\').val();
						Virtuemart.setproducttype($(this),id);

					}
				});
			});';
			//vmJsApi::addJScript('recalcReady',$j);

			/** GALT
				 * Notice for Template Developers!
				 * Templates must set a Virtuemart.container variable as it takes part in
				 * dynamic content update.
				 * This variable points to a topmost element that holds other content.
				 */
			$j = "Virtuemart.container = jQuery('.productdetails-view');
			Virtuemart.containerSelector = '.productdetails-view';";

			vmJsApi::addJScript('ajaxContent',$j);

			echo vmJsApi::writeJS();
			?>
		</div>
	</div>
</div>
<script type="text/javascript">
jQuery(function($){
	$('#zoom-product-thumb .zimg').on( 'click', function() {
		var src = $(this).attr('src');
		$('#zoom-product').attr('src',src);
	});
});
</script>


