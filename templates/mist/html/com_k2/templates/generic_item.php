<?php
/**
 * @package Hoxa - Responsive Multipurpose Joomla Template
 * @author Cththemes - www.cththemes.com
 * @date: 01-10-2014
 *
 * @copyright  Copyright ( C ) 2014 cththemes.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

// no direct access
defined('_JEXEC') or die;

// Define default image size (do not change)
//K2HelperUtilities::setDefaultImage($this->item, 'itemlist', $this->params);
$extraFields = array();

if($this->item->extra_fields){
	if(!is_array($this->item->extra_fields)){
		$extraFields = json_decode($this->item->extra_fields);
	}else{
		$extraFields = $this->item->extra_fields;
	}
}

if(!empty($extraFields)){
	$postType = $extraFields[0]->value;
	$postLink = $extraFields[3]->value;
}

?>

<article class="post  margin-top-70">
	<?php
	switch ($postType) :
		case '1': # single photo 
		$icon = 'picture-o';
		?>
		<figure>

			<img src="<?php echo JURI::root(true).$extraFields[1]->value; ?>" alt="">

			<figcaption>

				<a href="<?php echo JURI::root(true).$extraFields[1]->value; ?>" class="zoom"><i class="fa fa-search"></i></a>

			</figcaption>			

		</figure>
	<?php	break;
		case '2': # youtube video 
		$icon = 'youtube';
		$id = array();
		// get youtube video id from link
		preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $postLink, $id);
        //support embed link pasted at link
        if(empty($id) || !is_array($id)){
            preg_match('/embed[\/]([^\\?\\&]+)[\\?]/', $postLink, $id);
        }
    	if(!empty($id[1])) : ?>
    	<div class="video">

			<iframe src="http://www.youtube.com/embed/<?php echo $id[1];?>"></iframe>

		</div>
		<?php endif;?>

	<?php	break;
		case '3': # vimeo video 
		$icon = 'video-camera';
		$id = array();
		// get vimeo video id from link
		preg_match('/http:\/\/vimeo.com\/(\d+)$/', $postLink, $id);

		if(!empty($id[1])) :
		if(count($id[1])) :?>
		<div class="video">

			<iframe src="http://player.vimeo.com/video/<?php echo $id[1];?>" style="border:0;width:100%; height:281px;"></iframe>

		</div>
		<?php endif;endif;?>
	<?php	break;
		case '4': # image slider 
		$icon = 'picture-o';
		?>
		<div class="plugin-container post-id">

			<?php
	    	foreach ($extraFields as $key => $field) :
		    	if($key > 1 && trim($field->value) !='') :
		    ?>
					<a href="<?php echo JURI::root(true).$field->value;?>" class="post-img zoom gallery-post-id"><img src="<?php echo JURI::root(true).$field->value;?>" alt="<?php echo $this->item->title. '-image-'.($key+1);?>"></a>

			<?php endif; endforeach; ?>

			<!-- Nav //-->

			<div class="riva-insert-menu-here"></div>

		</div>
		<script type="text/javascript">
		jQuery(function($){
		if($('.post-id').length and $('.post-img').length){
			$('.post-id').rivaCarousel({
				style:'horizontal',
				navigation:'bullets',
				navigation_class:'secondary-bg-lighten padding-bottom-15 width-100 margin-top-0 nav-st-1',
				navigation_item_class:'',
				visible: 1,
				selector:'post-img',
				gutter:0,
				infinite:1,
				autostart:1
			});
			}
		});
		</script>
	<?php	break;
		case '5': # soundcloud audio 
		$icon = 'volume-up';
		$url = str_replace(":", "%3A", $postLink);?>
		<!-- Audio //-->

		<div class="audio">

			<iframe style="border:0;width:100%; height:150px; " src="https://w.soundcloud.com/player/?url=<?php echo $url;?>"></iframe>

		</div>
	<?php	break;
		case '6': # soundcloud audio 
		$icon = 'quote-left';?>
		<!-- quote post //-->

		<div class="quote">

			<div class="content">

				<?php echo $this->item->introtext;?>

			</div>

			<div class="author">

				- <?php if(isset($this->item->author->link) && $this->item->author->link): ?>
				  <a href="<?php echo $this->item->author->link; ?>"><?php echo $this->item->author->name; ?></a>
				  <?php else: ?>
				  <a href="#"><?php echo $this->item->author->name; ?></a>
				  <?php endif; ?>

			</div>

		</div>
	<?php	break;
		case '7': # soundcloud audio 
		$icon = 'external-link';?>
		<!-- quote post //-->

		<div class="quote">

			<div class="content">

				<a href="<?php echo $postLink;?>" class="title"><?php echo $postLink;?></a>

			</div>

		</div>
	<?php	break;
		default: # code... ?>

	<?php
		$icon = 'pencil';
			break;
	endswitch; ?>
	<!-- Post meta //-->

	<div class="meta">

		<span>

			<i class="fa fa-calendar"></i> <?php echo JHTML::_('date', $this->item->created, 'M d, Y'); ?>

		</span>
		
		<span>

			<i class="fa fa-folder-open"></i> <a href="<?php echo $this->item->category->link; ?>"><?php echo $this->item->category->name;?></a>

		</span>
		
	</div>

	<!-- Post excerpt //-->

	<div class="content">

		<p class="title"><i class="fa fa-<?php echo $icon;?>"></i> <a href="<?php echo $this->item->link; ?>"><?php echo $this->item->title;?></a></p>

		<?php if($postType != '6') :?>
			<?php if($this->item->params->get('catItemIntroText')): ?>
			<!-- Item introtext -->
			  	<?php echo $this->item->introtext; ?>
			<?php endif; ?>
		<?php endif; ?>
	</div>

	<!-- Post read more link //-->
	<?php if ($this->item->params->get('catItemReadMore')): ?>
	<div class="readmore">

		<a href="<?php echo $this->item->link; ?>"><i class="fa fa-angle-double-right"></i> <?php echo JText::_('TPL_BISS_READ_MORE_TEXT'); ?></a>

	</div>
	<?php endif; ?> 

</article>

	