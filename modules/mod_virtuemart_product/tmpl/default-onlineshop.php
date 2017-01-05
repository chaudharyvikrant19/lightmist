<?php // no direct access
defined ('_JEXEC') or die('Restricted access');
// add javascript for price and cart, need even for quantity buttons, so we need it almost anywhere
vmJsApi::jPrice();



$col = 1;
$pwidth = ' width' . floor (100 / $products_per_row);
if ($products_per_row > 1) {
	$float = "floatleft";
} else {
	$float = "center";
}

$verticalseparator = " vertical-separator";
$rowsHeight = shopFunctionsF::calculateProductRowsHeights($products,$currency,$products_per_row);

?>
<div class="vmgroup<?php echo $params->get ('moduleclass_sfx') ?>">

	<?php if ($headerText) { ?>
	<div class="vmheader"><?php echo $headerText ?></div>
	<?php
}
	if ($display_style == "div") {
		$col = 1;
		$nb = 1;
		$row = 1; ?>
		<div class="vmproduct<?php echo $params->get ('moduleclass_sfx'); ?> productdetails">
			<?php foreach ($products as $product) { 
			// Show the horizontal seperator
		if ($col == 1 && $nb > $products_per_row) { ?>
	       <!-- <div class="horizontal-separator"></div> -->
		<?php }

		// this is an indicator wether a row needs to be opened or not
		if ($col == 1) { ?>
	   <div class="row">
		<?php }

		// Show the vertical seperator
		if ($nb == $products_per_row or $nb % $products_per_row == 0) {
			$show_vertical_separator = ' ';
		} else {
			$show_vertical_separator = $verticalseparator;
		}

		$numcol = 'col-sm-6 col-md-4';
        switch ($products_per_row) {
        	case '1':
        		$numcol = 'col-md-12';
        		break;
        	case '2':
        		$numcol = 'col-sm-6 col-md-6';
        		break;
        	case '3':
        		$numcol = 'col-sm-6 col-md-4';
        		break;
        	case '4':
        		$numcol = 'col-sm-6 col-md-3';
        		break;
        	case '6':
        		$numcol = 'col-sm-6 col-md-2';
        		break;
        	
        	default:
        		$numcol = 'col-sm-6 col-md-4';
        		break;
        } ?>
			<div class="<?php echo $numcol; ?>">
				<div class="product-item">
	                <div class="product-img">
	                	<img src="<?php echo JURI::root(true).'/'.$product->file_url;?>" alt="">
	                    <div class="product-overlay">
	                        <?php echo shopFunctionsF::renderVmSubLayout('addtocart',array('product'=>$product,'rowHeights'=>$rowsHeight[$row])); ?>
	                        <div class="quick-view">
	                            <a href="<?php echo JURI::root(true).'/'.$product->file_url;?>" data-rel="prettyPhoto[portfolio]">
	                            <i class="fa fa-eye"></i> <?php echo JTEXT::_('TPL_MIST_QUICK_VIEW') ?></a>
	                        </div>
	                    </div>
	                </div>
	                <div class="product-details">
	                    <a href="<?php echo $product->link; ?>"><h4><?php echo $product->product_name; ?></h4></a>
	                    <div class="text-color"><?php echo shopFunctionsF::renderVmSubLayout('prices',array('product'=>$product,'currency'=>$currency)); ?></div>
	                    <div class="clear"></div>
	                </div>
	            </div>
			</div>
			<?php
			if ($col == $products_per_row && $products_per_row && $col < $totalProd) {
				echo "</div><div style='clear:both;'></div>";
				$col = 1;
			} else {
				$col++;
			}
		} ?>
		</div>

		<?php
	} else {
		$last = count ($products) - 1;
		?>

		<ul class="vmproduct<?php echo $params->get ('moduleclass_sfx'); ?> productdetails">
			<?php foreach ($products as $product) : ?>
			<li class="<?php echo $pwidth ?> <?php echo $float ?>">
				<?php
				if (!empty($product->images[0])) {
					$image = $product->images[0]->displayMediaThumb ('class="featuredProductImage" border="0"', FALSE);
				} else {
					$image = '';
				}
				echo JHTML::_ ('link', JRoute::_ ('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' . $product->virtuemart_category_id), $image, array('title' => $product->product_name));
				echo '<div class="clear"></div>';
				$url = JRoute::_ ('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' .
					$product->virtuemart_category_id); ?>
				<a href="<?php echo $url ?>"><?php echo $product->product_name ?></a>        <?php    echo '<div class="clear"></div>';
				// $product->prices is not set when show_prices in config is unchecked
				if ($show_price and  isset($product->prices)) {
					echo '<div class="product-price">'.$currency->createPriceDiv ('salesPrice', '', $product->prices, FALSE, FALSE, 1.0, TRUE);
					if ($product->prices['salesPriceWithDiscount'] > 0) {
						echo $currency->createPriceDiv ('salesPriceWithDiscount', '', $product->prices, FALSE, FALSE, 1.0, TRUE);
					}
					echo '</div>';
				}
				if ($show_addtocart) {
					echo shopFunctionsF::renderVmSubLayout('addtocart',array('product'=>$product));
				}
				?>
			</li>
			<?php
			if ($col == $products_per_row && $products_per_row && $last) {
				echo '
		</ul><div class="clear"></div>
		<ul  class="vmproduct' . $params->get ('moduleclass_sfx') . ' productdetails">';
				$col = 1;
			} else {
				$col++;
			}
			$last--;
		endforeach; ?>
		</ul>
		<div class="clear"></div>

		<?php
	}
	if ($footerText) : ?>
		<div class="vmfooter<?php echo $params->get ('moduleclass_sfx') ?>">
			<?php echo $footerText ?>
		</div>
		<?php endif; ?>
</div>
