<?php
/**
 * @package Biss - Responsive Multipurpose Joomla Template
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
$postType = 0;
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

<div class="grid-item">
	<?php
	switch ($postType) :
	case '1': # single photo ?>
		<?php if(!empty($extraFields[1]->value)): ?>
        <div class="post-image">
            <img src="<?php echo JURI::root(true).$extraFields[1]->value; ?>" width="600" height="400" alt="" title="" />
        </div>
    	<?php endif; ?>
    	<?php	break;
    case '2': # slider image ?>
    	<div id="carousel-example-generic<?php echo $this->item->id;?>" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php foreach ($extraFields as $key => $field) :
		    	if($key > 2 && trim($field->value) !='') : ?>
	            <li data-target="#carousel-example-generic<?php echo $this->item->id;?>" data-slide-to="<?php echo ($key-3);?>" <?php if($key === 3) {echo ' class="active"';} ?>></li>
	            <?php endif; endforeach; ?>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <?php
		    	foreach ($extraFields as $key => $field) :
			    	if($key > 2 && trim($field->value) !='') : ?>
			    	<div class="item<?php if($key === 3) echo ' active'; ?>">
			    		<a href="<?php echo $this->item->link; ?>" class="image">
		                	<img src="<?php echo JURI::root(true).$field->value;?>" width="600" height="400" alt="<?php echo $this->item->title. '-image-'.($key+1);?>" title=""  class="img-responsive" />
		                </a>
		            </div>
				<?php endif; endforeach; ?>
            </div>
        </div>
        <?php	break;
    case '3': # youtube video 
    	$id = array();
		// get youtube video id from link
		preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $postLink, $id);
        //support embed link pasted at link
        if(empty($id) || !is_array($id)){
            preg_match('/embed[\/]([^\\?\\&]+)[\\?]/', $postLink, $id);
        }
    	if(!empty($id[1])) : ?>
    	<div class="video">

			<iframe src="http://www.youtube.com/embed/<?php echo $id[1];?>" style="border:0;width:100%; height:281px;"></iframe>

		</div>
		<?php endif;?>

		<?php	break;
    case '4': # vimeo video 
		$id = array();
		// get vimeo video id from link
		preg_match('/http:\/\/vimeo.com\/(\d+)$/', $postLink, $id);

		if(!empty($id[1])) :
		if(count($id[1])) :?>
		<div class="video">

			<iframe src="http://player.vimeo.com/video/<?php echo $id[1];?>" style="border:0; width:100%; height:281px;"></iframe>

		</div>
		<?php endif;endif;?>
		<?php	break;
	case '5': # soundcloud audio 
		$url = str_replace(":", "%3A", $postLink);?>
		<!-- Audio //-->

		<div class="audio">

			<iframe  style="border:0;width:100%; height:150;" src="https://w.soundcloud.com/player/?url=<?php echo $url;?>"></iframe>

		</div>
		<?php	break;
		default: # code... ?>

	<?php break;
	endswitch; ?>


    <h2 class="post-title">
        <a href="<?php echo $this->item->link; ?>"><?php echo $this->item->title; ?></a>
    </h2>
    <?php if($this->item->params->get('catItemIntroText')): ?>
    <div class="post-content"><?php echo $this->item->introtext;?></div>
	<?php endif; ?>
    <div class="post-meta">
        <!-- Author  -->
    	<?php if(isset($this->item->author->link) && $this->item->author->link): ?>
	  	<a href="<?php echo $this->item->author->link; ?>">
	  		<span class="author"><i class="fa fa-user"></i> <?php echo $this->item->author->name; ?></span>
        </a> 
	  	<?php else: ?>
	  	<span class="author">
        <i class="fa fa-user"></i> <?php echo $this->item->author->name; ?></span> 
	  	<?php endif; ?>

        <!-- Meta Date -->
         
        <span class="time">
        <i class="fa fa-calendar"></i> <?php echo JHTML::_('date', $this->item->created, 'M.d.Y'); ?></span> 
        <!-- Category -->
         
        <span class="category pull-right">
        <i class="fa fa-heart"></i> <a href="<?php echo $this->item->category->link; ?>"><?php echo $this->item->category->name;?></a></span>

    </div>
</div>