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

//ElementParser::do_shortcode($content);
//echo'<pre>';var_dump($processItemsArray);die;

$classes = "azp_owlcarousel owl-carousel owl-theme";

$classes .= ' '.$animation_data['trigger'];

$animationData = $animation_data['data'];

if(!empty($class)){
	$classes .= ' '.$class;
}

$classes = 'class="'.$classes.'"';
if(!empty($id)){
	$id = 'id="'.$id.'"';
}

$dataObj = new stdClass;
if(!empty($transtyle)){
	$dataObj->transitionStyle = $transtyle;
}else{
	$dataObj->transitionStyle = false;
}
$dataObj->slideSpeed = (int)$sliderspeed;
$dataObj->rewindSpeed = (int)$rewindspeed;
$dataObj->items = (int)$items;
if($issingle === '1'){
	$dataObj->singleItem = true;
}else{
	$dataObj->singleItem = false;
}
if($autoplay == 'true'){
	$dataObj->autoPlay = true;
}elseif(is_numeric($autoplay)){
	$dataObj->autoPlay = (int)$autoplay;
}else{
	$dataObj->autoPlay = false;
}
if($pagination === '1'){
	$dataObj->pagination = true;
}else{
	$dataObj->pagination = false;
}
$dataObj->paginationSpeed = (int)$paginationspeed;
if($navigation === '1'){
	$dataObj->navigation = true;
}else{
	$dataObj->navigation = false;
}
if($autoheight === '1'){
	$dataObj->autoHeight = true;
}else{
	$dataObj->autoHeight = false;
}
if($mousedrag === '1'){
	$dataObj->mouseDrag = true;
}else{
	$dataObj->mouseDrag = false;
}
if($touchdrag === '1'){
	$dataObj->touchDrag = true;
}else{
	$dataObj->touchDrag = false;
}
if($stoponhover === '1'){
	$dataObj->stopOnHover = true;
}else{
	$dataObj->stopOnHover = false;
}
$dataObj = rawurlencode(json_encode($dataObj));
?>
<div <?php echo $id;?> <?php echo $classes.' '.$owlcarouselstyle.' '.$animationData;?> data-options="<?php echo $dataObj;?>">
<?php if(count($owlCarouselItemsArray)) : ?>
	<?php foreach ($owlCarouselItemsArray as $key => $owl) :?>
	<div class="item <?php echo $owl['extraclass'];?>">		
		<?php if(!empty($owl['slideimage'])) :?>
		<div class="owl-img-wrap">
			<img src="<?php echo JURI::root(true).'/'.$owl['slideimage'];?>" class="owl-img" alt="">
		</div>
		<?php endif;?>
		<?php echo ElementParser::do_shortcode($owl['content'] ); ?>
	</div>
	<?php endforeach; ?>	

<?php endif;?>
</div>