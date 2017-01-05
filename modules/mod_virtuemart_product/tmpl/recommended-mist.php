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
<div class="owl-carousel navigation-1" data-pagination="false" data-items="1" data-autoplay="true" data-navigation="true">

	<?php foreach ($products as $product) :?>
	<!-- Product start //-->
	<a href="<?php echo $product->link; ?>">
		<img src="<?php echo JURI::root(true).'/'.$product->file_url;?>" width="270" height="270" alt="" />
	</a>
	<!-- Product end //-->
	<?php endforeach; ?>

	<!-- Nav //-->

</div>