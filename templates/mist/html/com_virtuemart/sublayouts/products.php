<?php
/**
 * sublayout products
 *
 * @package	VirtueMart
 * @author Max Milbers
 * @link http://www.virtuemart.net
 * @copyright Copyright (c) 2014 VirtueMart Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL2, see LICENSE.php
 * @version $Id: cart.php 7682 2014-02-26 17:07:20Z Milbo $
 */

defined('_JEXEC') or die('Restricted access');
$products_per_row = $viewData['products_per_row'];
$currency = $viewData['currency'];
$showRating = $viewData['showRating'];
$verticalseparator = " vertical-separator";
echo shopFunctionsF::renderVmSubLayout('askrecomjs');

$ItemidStr = '';
$Itemid = shopFunctionsF::getLastVisitedItemId();
if(!empty($Itemid)){
	$ItemidStr = '&Itemid='.$Itemid;
}

foreach ($viewData['products'] as $type => $products ) {

	$rowsHeight = shopFunctionsF::calculateProductRowsHeights($products,$currency,$products_per_row);

	if(!empty($type) and count($products)>0){
		$productTitle = vmText::_('COM_VIRTUEMART_'.strtoupper($type).'_PRODUCT'); ?>
<div class="<?php echo $type ?>-view">
  <h4><?php echo $productTitle ?></h4>
		<?php // Start the Output
    }

	// Calculating Products Per Row
	$cellwidth = ' width'.floor ( 100 / $products_per_row );

	$BrowseTotalProducts = count($products);

	$col = 1;
	$nb = 1;
	$row = 1;

	foreach ( $products as $product ) {

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
		}
	    // Show Products ?>
		<!-- <div class="product vm-col<?php echo ' vm-col-' . $products_per_row . $show_vertical_separator ?>"> -->
		
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
	    $nb ++;
	    
	      // Do we need to close the current row now?
	      if ($col == $products_per_row || $nb>$BrowseTotalProducts) { ?>
	    <div class="clear"></div>
  </div>
      <?php
      	$col = 1;
		$row++;
    } else {
      $col ++;
    }
  }

      if(!empty($type)and count($products)>0){
        // Do we need a final closing row tag?
        //if ($col != 1) {
      ?>
    <div class="clear"></div>
  </div>
    <?php
    // }
    }
  }
