<?php // no direct access
defined('_JEXEC') or die('Restricted access');

//dump ($cart,'mod cart');
// Ajax is displayed in vm_cart_products
// ALL THE DISPLAY IS Done by Ajax using "hiddencontainer" ?>

<!-- Virtuemart 2 Ajax Card -->

<a href="#">
	<?php if ($data->totalProduct) echo  $data->cart_show; ?>
    <i class="fa fa-shopping-cart"></i>
    <span class="product-count"><?php echo count($show_product_list); ?></span>
</a>
<ul class="dropdown-menu">
    <li>
    	<?php foreach ($data->products as $product): ?>
	        <div class="row">
	            <div class="col-xs-12">
	                <p>
	                    <a href="#" class="product-name"><?php echo  $product['product_name'] ?></a>
	                </p>
	                <p>
	                    <a href="#"><?php echo  $product['quantity'] ?>
	                    <i class="fa fa-times"></i>
	                    <?php if ($show_price and $currencyDisplay->_priceConfig['salesPrice'][0]) { ?>
						  <span class="minicart-price"><?php echo $product['subtotal_with_tax'] ; ?></span>
						<?php } ?>
	                    </a>
	                </p>
	            </div>
	        </div>
    	<?php endforeach; ?>

        <!-- Product 2 -->
        <div class="row">
            <div class="col-xs-5">
                <p class="minicart-total"><?php echo $data->billTotal; ?></p>
            </div>
            <div class="col-xs-7 text-right">
                <?php echo  $data->cart_show; ?>
            </div>
        </div>
        <!-- Product 2 -->
    </li>
</ul>
