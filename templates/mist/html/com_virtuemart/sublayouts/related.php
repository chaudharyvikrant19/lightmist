<?php defined('_JEXEC') or die('Restricted access');

$related = $viewData['related'];
$customfield = $viewData['customfield'];//var_dump($customfield);die;
$thumb = $viewData['thumb'];//echo $thumb;die;
//var_dump($related);die;

$pid= $related->virtuemart_product_id; // product id here
$sql="select i.file_url as image from #__virtuemart_medias as i, 
#__virtuemart_product_medias as mi where 
i.virtuemart_media_id = mi.virtuemart_media_id and 
mi.virtuemart_product_id =".$pid."  limit 0,1";

// Get a db connection.
$dbb = JFactory::getDbo();
$dbb->setQuery($sql);
$results = $dbb->loadObjectList();

?>

<!-- Product start //-->
<div class="product-item item">

	<figure>

		<img src="<?php echo $results[0]->image; ?>" alt="">

		<figcaption>

			<a href="<?php echo $results[0]->image; ?>" class="zoom"><i class="fa fa-search"></i></a>

		</figcaption>			

	</figure>

	<div class="product-details">

		<p class="title"><a href="<?php echo $related->link; ?>"><?php echo $related->product_name; ?></a></p>


		<p class="price border-bottom-1">

			<?php if($customfield->wPrice){
				$currency = calculationHelper::getInstance()->_currencyDisplay;
				echo $currency->createPriceDiv ('salesPrice', 'COM_VIRTUEMART_PRODUCT_SALESPRICE', $related->prices);
			} ?>
		</p>

		<p>

			<?php echo shopFunctionsF::renderVmSubLayout('addtocart',array('product'=>$related)); ?>

			<a href="<?php echo $related->link; ?>" class="details"><i class="fa fa-bars"></i> <?php echo JTEXT::_('TPL_BISS_DETAILS_TEXT'); ?></a>

		</p>

	</div>

</div>
<!-- Product end //-->