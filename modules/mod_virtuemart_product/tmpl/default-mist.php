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
?>

<!-- Top products start //-->


<ul class="latest-posts clearfix shop">

	<?php foreach ($products as $product) :?>
	<!-- Product start //-->
	<li>
        <div class="post-thumb">
        	<img class="img-rounded" src="<?php echo JURI::root(true).'/'.$product->file_url;?>" width="84" height="84" alt="">
        </div>
        <div class="post-details">
            <div class="description">
                <a href="<?php echo $product->link; ?>">
                    <!-- Text -->
                    <h5><?php echo $product->product_name; ?></h5>
                </a>
            </div>
            <div class="price">
	            <?php echo shopFunctionsF::renderVmSubLayout('prices',array('product'=>$product,'currency'=>$currency)); ?>
	        </div>
            <div class="star-rating">
            <?php //echo shopFunctionsF::renderVmSubLayout('rating',array('showRating'=>$showRating, 'product'=>$product)); ?>
            </div>
        </div>
    </li>

	<!-- Product end //-->
	<?php endforeach; ?>

	<!-- Nav //-->

</ul>