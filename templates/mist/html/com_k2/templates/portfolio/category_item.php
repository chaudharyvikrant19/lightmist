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
$menu = JFactory::getApplication()->getMenu();
$defaultMenu = $menu->getDefault();
$activeMenu = $menu->getActive() ? $menu->getActive() : $menu->getDefault();
$portfolio_style = 'masonry';
if($activeMenu->params->get('portfolio_style')){
	$portfolio_style = $activeMenu->params->get('portfolio_style','masonry');
}
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

$filter = getItemTagsFilter($this->item);
?>
<?php if($portfolio_style == 'list'): ?>
<!-- Item 1 -->
<div class="grids row mix all html">
    <div class="row">
        <div class="col-sm-4 col-md-4">
            <h3 class="title">
                <a href="<?php echo $this->item->link; ?>"><?php echo $this->item->title; ?></a>
            </h3>
            <?php echo $extraFields[2]->value;?>
            <a href="<?php echo $this->item->link; ?>" class="btn btn-default"><?php echo JTEXT::_('TPL_MIST_PROJECT_DETAILS'); ?></a>
        </div>
        <div class="col-sm-8 col-md-8">
        	<?php switch ($postType) :
        	case '3':case '4':# single photo ?>
        		<?php if(!empty($extraFields[1]->value)): ?>
        		<a href="<?php echo JURI::root(true).$extraFields[3]->value;?>" class="image" data-rel="prettyPhoto">
        			<img src="<?php echo JURI::root(true).$extraFields[1]->value;?>" width="790" height="440" alt="" />
        		</a>
        		<?php endif; ?>
			<?php	break;
			case '1': # single photo ?>
				<?php if(!empty($extraFields[1]->value)): ?>
	            <a href="<?php echo $this->item->link; ?>" class="image">
	                <img src="<?php echo JURI::root(true).$extraFields[1]->value;?>" width="790" height="440" alt="" />
	            </a>
	        	<?php endif; ?>
            <?php	break;
			case '2': # image slider  ?>
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
				                	<img src="<?php echo JURI::root(true).$field->value;?>" alt="<?php echo $this->item->title. '-image-'.($key+1);?>" title=""  class="img-responsive" />
				                </a>
				            </div>
						<?php endif; endforeach; ?>
		            </div>
		        </div>
			<?php break; endswitch; ?>
        </div>
    </div>
</div>
<!-- Item 1 Ends-->
<?php else: ?>
<!-- Project item start //-->
<div class="grid-item all <?php echo $filter;?>">
	<?php switch ($postType) :
	case '1': case '3':case '4':# single photo ?>
		<?php if(!empty($extraFields[1]->value)): ?>
		<img src="<?php echo JURI::root(true).$extraFields[1]->value;?>" alt="" class="img-responsive" >
		<?php endif; ?>
	<?php	break;
	case '2': # image slider 
		?>
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
		                <img src="<?php echo JURI::root(true).$field->value;?>" alt="<?php echo $this->item->title. '-image-'.($key+1);?>" title=""  class="img-responsive" />
		            	<div class="img-overlay"></div>
	                    <div class="figcaption">
		                    <div class="caption-block">
					            <h4><?php echo $this->item->title;?></h4>
					            <p><?php echo strlen($this->item->introtext)>60 ? substr($this->item->introtext,0,59).'...': $this->item->introtext;?></p>
					        </div>
		                    <!-- Image Popup-->
		                    <a href="<?php echo JURI::root(true).$field->value;?>" data-rel="prettyPhoto[portfolio]">
		                        <i class="fa fa-search"></i>
		                    </a> 
		                    <a href="<?php echo $this->item->link; ?>">
		                        <i class="fa fa-link"></i>
		                    </a>
		                </div>
		            </div>
				<?php endif; endforeach; ?>
            </div>
        </div>
	<?php break; endswitch; ?>

	<?php if($postType !== '2'): ?>
		<div class="img-overlay"></div>
	    <div class="figcaption">
	    	<div class="caption-block">
	            <h4><?php echo $this->item->title;?></h4>
	            <p><?php echo strlen($this->item->introtext)>60 ? substr($this->item->introtext,0,59).'...': $this->item->introtext;?></p>
	        </div>
	        <?php if($postType == '3' or $postType == '4'): ?>
		        <a href="<?php echo JURI::root(true).$extraFields[3]->value;?>" data-rel="prettyPhoto">
		            <i class="fa fa-search"></i>
		        </a>
		    <?php else: ?>
		    	<a href="<?php echo JURI::root(true).$extraFields[1]->value;?>" data-rel="prettyPhoto[portfolio]">
		            <i class="fa fa-search"></i>
		        </a>
		    <?php endif; ?>
	        <a href="<?php echo $this->item->link; ?>">
	            <i class="fa fa-link"></i>
	        </a>
	    </div>
	<?php endif; ?>
</div>
<!-- Project item end //-->
<?php endif; ?>

