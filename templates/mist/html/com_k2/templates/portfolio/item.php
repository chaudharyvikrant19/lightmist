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

require_once JPATH_BASE.'/components/com_azurapagebuilder/helpers/elementparser.php';
ElementParser::addShortcodeFiles();
function getK2CategoryLink($catid){
    require_once (JPATH_SITE.'/components/com_k2/helpers/route.php');
    return urldecode(JRoute::_(K2HelperRoute::getCategoryRoute($catid)));
}
function getItemTagsFilter($item, $implode = " "){
	require_once JPATH_BASE.'/components/com_k2/models/item.php';

	$K2ModelItem = new K2ModelItem;

    $tags = array();
	$itemTags = $K2ModelItem->getItemTags($item->id);
	if(count($itemTags)) {
		foreach ($itemTags as $tag) {
            $tagName = str_replace(" ", "-", $tag->name);
            $tags[] = strtolower($tagName);
        }
	}
    $filter = implode($implode, $tags);

    return $filter;
}

global $k2item;
$k2item = $this->item;
$extraFields = json_decode($this->item->extra_fields);
$postType = "";
$postLink = "";
if(isset($extraFields[0]->value))
$postType = $extraFields[0]->value;
if(isset($extraFields[3]->value))
$postLink = $extraFields[3]->value;

?>
<section id="works" class="page-section row">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
            	<?php switch ($postType) :
				    case '1': # single photo ?>
				    <?php if(!empty($extraFields[1]->value)): ?>
				    	<img src="<?php echo JURI::root(true).$extraFields[1]->value;?>" class="img-responsive" alt="<?php echo $this->item->title;?>">
				    <?php endif; ?>
            	<?php   break;
			        case '2': # image slider ?>
				        <div class="owl-carousel pagination-1 light-switch pordetail" data-pagination="true" data-items="1" data-autoplay="true" data-navigation="false">
	                        <?php
					    	foreach ($extraFields as $key => $field) :
						    	if($key > 2 && trim($field->value) !='') : ?>
					                <img src="<?php echo JURI::root(true).$field->value;?>" alt="<?php echo $this->item->title. '-image-'.($key+1);?>" title=""   width="1000" height="740" />
							<?php endif; endforeach; ?>
	                    </div>
            	<?php   break;
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
							<iframe src="http://www.youtube.com/embed/<?php echo $id[1];?>" style="border:0;width:100%; height:500px;" ></iframe>
						</div>
				        <?php endif;?>

		    	<?php   break;
			        case '4': # vimeo video 
				        $id = array();
				        // get vimeo video id from link
				        preg_match('/http:\/\/vimeo.com\/(\d+)$/', $postLink, $id);
				        if(!empty($id[1])) :
				        if(count($id[1])) :?>
						<div class="video">
							<iframe src="http://player.vimeo.com/video/<?php echo $id[1];?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" style="border:0;width:100%;height:500px"></iframe>
						</div>
			        	<?php endif;endif;?>
			    <?php   break;
        			default: # code... ?>

    			<?php 	break;
    			endswitch; ?>

            </div>
            <div class="col-md-5 project-details">
                <?php if(!empty($extraFields[2]->value)) echo $extraFields[2]->value; ?>
            </div>
        </div>
    </div>
</section>
<div>

	<?php if(!empty($this->item->fulltext)): ?>
		<?php if($this->item->params->get('itemIntroText')): ?>
		<!-- Item introtext -->
		
			<?php echo $this->item->introtext; ?>
		
		<?php endif; ?>
		<?php if($this->item->params->get('itemFullText')): ?>
		<!-- Item fulltext -->

			<?php echo $this->item->fulltext; ?>

		<?php endif; ?>
	<?php else: ?>
		<!-- Item text -->

			<?php echo $this->item->introtext; ?>

	<?php endif; ?>
	<?php if($this->item->params->get('itemTwitterButton',1) || $this->item->params->get('itemFacebookButton',1) || $this->item->params->get('itemGooglePlusOneButton',1)): ?>
		<!-- Social sharing -->
		<div class="itemSocialSharing">

			<?php if($this->item->params->get('itemTwitterButton',1)): ?>
			<!-- Twitter Button -->
			<div class="itemTwitterButton">
				<a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal"<?php if($this->item->params->get('twitterUsername')): ?> data-via="<?php echo $this->item->params->get('twitterUsername'); ?>"<?php endif; ?>>
					<?php echo JText::_('K2_TWEET'); ?>
				</a>
				<script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>
			</div>
			<?php endif; ?>

			<?php if($this->item->params->get('itemFacebookButton',1)): ?>
			<!-- Facebook Button -->
			<div class="itemFacebookButton">
				<div id="fb-root"></div>
				<script type="text/javascript">
					(function(d, s, id) {
					  var js, fjs = d.getElementsByTagName(s)[0];
					  if (d.getElementById(id)) return;
					  js = d.createElement(s); js.id = id;
					  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
					  fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));
				</script>
				<div class="fb-like" data-send="false" data-width="200" data-show-faces="true"></div>
			</div>
			<?php endif; ?>

			<?php if($this->item->params->get('itemGooglePlusOneButton',1)): ?>
			<!-- Google +1 Button -->
			<div class="itemGooglePlusOneButton">
				<g:plusone annotation="inline" width="120"></g:plusone>
				<script type="text/javascript">
				  (function() {
				  	window.___gcfg = {lang: 'en'}; // Define button default language here
				    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
				    po.src = 'https://apis.google.com/js/plusone.js';
				    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
				  })();
				</script>
			</div>
			<?php endif; ?>

			<div class="clr"></div>
		</div>
	<?php endif; ?>
</div>

<div class="clearfix"></div>


