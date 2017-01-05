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
require_once JPATH_BASE.'/components/com_azurapagebuilder/helpers/elementparser.php';

function getK2CategoryLink($catid){
    require_once (JPATH_SITE.'/components/com_k2/helpers/route.php');
    return urldecode(JRoute::_(K2HelperRoute::getCategoryRoute($catid)));
}

?>

<section>
    <div class="container">
        <div class="row">
            <div>
            <!-- Post -->
            <article class="post single-post<?php echo ($this->item->featured) ? ' itemIsFeatured' : ''; ?><?php if($this->item->params->get('pageclass_sfx')) echo ' '.$this->item->params->get('pageclass_sfx'); ?>">
                <?php if(JRequest::getInt('print')==1): ?>
                <!-- Print button at the top of the print page only -->
                <a class="itemPrintThisPage" rel="nofollow" href="#" onclick="window.print();return false;">
                    <span><?php echo JText::_('K2_PRINT_THIS_PAGE'); ?></span>
                </a>
                <?php endif; ?>

                <!-- Plugins: BeforeDisplay -->
                <?php echo $this->item->event->BeforeDisplay; ?>

                <!-- K2 Plugins: K2BeforeDisplay -->
                <?php echo $this->item->event->K2BeforeDisplay; ?>


                <?php
                switch ($postType) :
                    case '1': # single photo  ?>

                        <div class="post-image opacity"><img src="<?php echo JURI::root(true).$extraFields[1]->value; ?>" width="1170" alt="" title=""></div>

                    <?php   break;
                    case '2': # slider image ?>
                        <div class="owl-carousel pagination-1 light-switch pordetail" data-pagination="true" data-items="1" data-autoplay="true" data-navigation="false">
                            <?php
                            foreach ($extraFields as $key => $field) :
                                if($key > 2 && trim($field->value) !='') : ?>
                                    <img src="<?php echo JURI::root(true).$field->value;?>" alt="<?php echo $this->item->title. '-image-'.$key;?>" title=""   width="1170" height="382" />
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

                            <iframe src="http://www.youtube.com/embed/<?php echo $id[1];?>" style="width:100%;min-height:382px"></iframe>

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

                            <iframe src="http://player.vimeo.com/video/<?php echo $id[1];?>" style="border:0;width:100%; min-height:382px;"></iframe>

                        </div>
                        <?php endif;endif;?>
                    <?php   break;

                    case '5': # soundcloud audio 
                        $url = str_replace(":", "%3A", $postLink);?>
                        <!-- Audio //-->

                        <div class="audio">

                            <iframe  style="border:0;width:100%; height:150px;" src="https://w.soundcloud.com/player/?url=<?php echo $url;?>"></iframe>

                        </div>

                    <?php   break;
                        default: # code... ?>
                    <?php break;
                endswitch; ?>

                <div class="post-content top-pad-20">
                    <?php if($this->item->params->get('itemTitle')): ?>
                        <p class="title">
                            <?php if(isset($this->item->editLink)): ?>
                            <!-- Item edit link -->
                            <span class="itemEditLink">
                                <a class="modal" rel="{handler:'iframe',size:{x:990,y:550}}" href="<?php echo $this->item->editLink; ?>">
                                    <?php echo JText::_('K2_EDIT_ITEM'); ?>
                                </a>
                            </span>
                            <?php endif; ?>
                            <a href=""><?php echo $this->item->title; ?></a>
                            <?php if($this->item->params->get('itemFeaturedNotice') && $this->item->featured): ?>
                            <!-- Featured flag -->
                            <span>
                                <sup>
                                    <?php echo JText::_('K2_FEATURED'); ?>
                                </sup>
                            </span>
                            <?php endif; ?>
                        </p>
                    <?php endif; ?>

                    <!-- Plugins: BeforeDisplayContent -->
                    <?php echo $this->item->event->BeforeDisplayContent; ?>

                    <!-- K2 Plugins: K2BeforeDisplayContent -->
                    <?php echo $this->item->event->K2BeforeDisplayContent; ?>

                    <?php if($this->item->params->get('itemImage') && !empty($this->item->image)): ?>
                    <!-- Item Image -->
                    <div class="itemImageBlock">
                        <span class="itemImage">
                            <a class="modal" rel="{handler: 'image'}" href="<?php echo $this->item->imageXLarge; ?>" title="<?php echo JText::_('K2_CLICK_TO_PREVIEW_IMAGE'); ?>">
                                <img src="<?php echo $this->item->image; ?>" alt="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>" style="width:<?php echo $this->item->imageWidth; ?>px;" />
                            </a>
                        </span>

                        <?php if($this->item->params->get('itemImageMainCaption') && !empty($this->item->image_caption)): ?>
                        <!-- Image caption -->
                        <span class="itemImageCaption"><?php echo $this->item->image_caption; ?></span>
                        <?php endif; ?>

                        <?php if($this->item->params->get('itemImageMainCredits') && !empty($this->item->image_credits)): ?>
                        <!-- Image credits -->
                        <span class="itemImageCredits"><?php echo $this->item->image_credits; ?></span>
                        <?php endif; ?>

                        <div class="cl"></div>
                    </div>
                    <?php endif; ?>


                    <?php if(!empty($this->item->fulltext)): ?>
                        <?php if($this->item->params->get('itemIntroText')): ?>

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

                    <?php if($this->item->params->get('itemTags') && count($this->item->tags)): ?>
                        <!-- Item tags -->
                        <p class="tags">
                            <?php foreach ($this->item->tags as $tag): ?>
                            <i class="fa fa-tag"></i> <a href="<?php echo $tag->link; ?>"><?php echo $tag->name; ?></a> 
                            <?php endforeach; ?>
                        </p>
                        <br>
                    <?php endif; ?>

                    <?php if($this->item->params->get('itemExtraFields') && count($this->item->extra_fields)): ?>
                    <!-- Item extra fields -->
                    <div class="itemExtraFields">
                        <h3><?php echo JText::_('K2_ADDITIONAL_INFO'); ?></h3>
                        <ul>
                            <?php foreach ($this->item->extra_fields as $key=>$extraField): ?>
                            <?php if($extraField->value != ''): ?>
                            <li class="<?php echo ($key%2) ? "odd" : "even"; ?> type<?php echo ucfirst($extraField->type); ?> group<?php echo $extraField->group; ?>">
                                <?php if($extraField->type == 'header'): ?>
                                <h4 class="itemExtraFieldsHeader"><?php echo $extraField->name; ?></h4>
                                <?php else: ?>
                                <span class="itemExtraFieldsLabel"><?php echo $extraField->name; ?>:</span>
                                <span class="itemExtraFieldsValue"><?php echo $extraField->value; ?></span>
                                <?php endif; ?>
                            </li>
                            <?php endif; ?>
                            <?php endforeach; ?>
                            </ul>
                        <div class="cl"></div>
                    </div>
                    <?php endif; ?>

                    <?php if($this->item->params->get('itemAttachments') && count($this->item->attachments)): ?>
                      <!-- Item attachments -->
                      <div class="itemAttachmentsBlock">
                          <span><?php echo JText::_('K2_DOWNLOAD_ATTACHMENTS'); ?></span>
                          <ul class="itemAttachments">
                            <?php foreach ($this->item->attachments as $attachment): ?>
                            <li>
                                <a title="<?php echo K2HelperUtilities::cleanHtml($attachment->titleAttribute); ?>" href="<?php echo $attachment->link; ?>"><?php echo $attachment->title; ?></a>
                                <?php if($this->item->params->get('itemAttachmentsCounter')): ?>
                                <span>(<?php echo $attachment->hits; ?> <?php echo ($attachment->hits==1) ? JText::_('K2_DOWNLOAD') : JText::_('K2_DOWNLOADS'); ?>)</span>
                                <?php endif; ?>
                            </li>
                            <?php endforeach; ?>
                          </ul>
                      </div>
                    <?php endif; ?>

                    

                    <?php if($this->item->params->get('itemHits') || ($this->item->params->get('itemDateModified') && intval($this->item->modified)!=0)): ?>
                    <div class="itemContentFooter">

                        <?php if($this->item->params->get('itemHits')): ?>
                        <!-- Item Hits -->
                        <span class="itemHits">
                            <?php echo JText::_('K2_READ'); ?> <b><?php echo $this->item->hits; ?></b> <?php echo JText::_('K2_TIMES'); ?>
                        </span>
                        <?php endif; ?>

                        <?php if($this->item->params->get('itemDateModified') && intval($this->item->modified)!=0): ?>
                        <!-- Item date modified -->
                        <span class="itemDateModified">
                            <?php echo JText::_('K2_LAST_MODIFIED_ON'); ?> <?php echo JHTML::_('date', $this->item->modified, JText::_('K2_DATE_FORMAT_LC2')); ?>
                        </span>
                        <?php endif; ?>

                        <div class="clr"></div>
                    </div>
                    <?php endif; ?>

                    <!-- Plugins: AfterDisplayContent -->
                    <?php echo $this->item->event->AfterDisplayContent; ?>

                    <!-- K2 Plugins: K2AfterDisplayContent -->
                    <?php echo $this->item->event->K2AfterDisplayContent; ?>

                </div>

                <!-- Post meta //-->
                <div class="post-meta">
                    <!-- Author  -->                                
                    <span class="author"><i class="fa fa-user"></i> <?php echo $this->item->author->name; ?></span>
                    <!-- Meta Date -->
                    <span class="time"><i class="fa fa-calendar"></i> <?php echo JHTML::_('date', $this->item->created, 'M d, Y'); ?></span>
                    <!-- Comments -->
                    <span class="category "><i class="fa fa-heart"></i> <a href="<?php echo $this->item->category->link; ?>"><?php echo $this->item->category->name;?></a></span>
                    <!-- Category -->
                    <?php if($this->item->params->get('itemCommentsAnchor') && $this->item->params->get('itemComments') && ( ($this->item->params->get('comments') == '2' && !$this->user->guest) || ($this->item->params->get('comments') == '1')) ): ?>
                    <!-- Anchor link to comments below - if enabled -->
                        <span class="comments pull-right">
                        <?php if(!empty($this->item->event->K2CommentsCounter)): ?>
                            <!-- K2 Plugins: K2CommentsCounter -->
                            <?php echo $this->item->event->K2CommentsCounter; ?>
                        <?php else: ?>
                            <?php if($this->item->numOfComments > 0): ?>
                            <a class="itemCommentsLink k2Anchor" href="<?php echo $this->item->link; ?>#itemCommentsAnchor">
                                <i class="fa fa-comments"></i> <?php echo ($this->item->numOfComments>1) ? JText::_('K2_COMMENTS') : JText::_('K2_COMMENT'); ?><?php echo ' '.$this->item->numOfComments; ?>
                            </a>
                            <?php else: ?>
                            <a class="itemCommentsLink k2Anchor" href="<?php echo $this->item->link; ?>#itemCommentsAnchor">
                                <i class="fa fa-comments"></i><span><?php echo JText::_('TPL_MIST_BE_FIRST'); ?></span>
                            </a>
                            <?php endif; ?>
                        <?php endif; ?>
                        </span>
                    <?php endif; ?>                                
                </div>
                <?php if($this->item->params->get('itemNavigation') && !JRequest::getCmd('print') && (isset($this->item->nextLink) || isset($this->item->previousLink))): ?>
                    <div class="readmore" style="margin-top:30px;">
                        <?php if(isset($this->item->previousLink)): ?>
                            <a class="prev-post" href="<?php echo $this->item->previousLink; ?>"><i class="fa fa-angle-double-left"></i>  <?php echo JTEXT::_('TPL_MIST_PREV_ARTICLE_TEXT'); ?></a>
                        <?php endif; ?>
                            <!-- <a class="project-back" href="<?php echo getK2CategoryLink($this->item->catid);?>"><i class="fa fa-th"></i></a> -->
                        <?php if(isset($this->item->nextLink)): ?>
                            <a class="next-post" style="float:right;" href="<?php echo $this->item->nextLink; ?>"><?php echo JTEXT::_('TPL_MIST_NEXT_ARTICLE_TEXT'); ?> <i class="fa fa-angle-double-right"></i></a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </article>
            <!-- Post end //-->
            </div>      
        </div>
        <hr>
        <div class="clearfix"></div>
        <div class="row">
            <!-- Share start //-->
            <?php if($this->item->params->get('itemTwitterButton',1) || $this->item->params->get('itemFacebookButton',1) || $this->item->params->get('itemGooglePlusOneButton',1)): ?>
                <!-- Social sharing -->
                <h4><?php echo JTEXT::_('TPL_MIST_SHARE_THIS_ARTICLE_TEXT'); ?></h4>
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

                    <div class="cl"></div>
                </div>
            <?php endif; ?>
            <!-- Share end //-->
            <div class="clearfix"></div>
            <!-- Author start //-->
            <?php if($this->item->params->get('itemAuthorBlock') && empty($this->item->created_by_alias)): ?>
                <!-- Author Block -->
                <h4><?php echo JText::_('TPL_MIST_ABOUT_POST_AUTHOR_TEXT');?></h4>

                <div class="post-author">

                    <?php if($this->item->params->get('itemAuthorImage') && !empty($this->item->author->avatar)): ?>
                        <figure><img class="itemAuthorAvatar" src="<?php echo $this->item->author->avatar; ?>" alt="<?php echo K2HelperUtilities::cleanHtml($this->item->author->name); ?>"></figure>
                    <?php endif; ?>

                    <div class="desc">

                        <p class="title"><?php echo $this->item->author->name; ?></p>
                        <?php if($this->item->params->get('itemAuthorDescription') && !empty($this->item->author->profile->description)): ?>
                            <p><?php echo $this->item->author->profile->description; ?></p>
                        <?php endif; ?>
                        <?php //echo '<pre>';var_dump($this->item->author);die;?>
                        <p>
                            <?php if($this->item->params->get('itemAuthorURL') && !empty($this->item->author->profile->url)): ?>
                                <span class="itemAuthorUrl"><?php echo JText::_('K2_WEBSITE'); ?> <a rel="me" href="<?php echo $this->item->author->profile->url; ?>" target="_blank"><?php echo str_replace('http://','',$this->item->author->profile->url); ?></a></span>
                            <?php endif; ?>

                            <?php if($this->item->params->get('itemAuthorEmail')): ?>
                                <span class="itemAuthorEmail"><?php echo JText::_('K2_EMAIL'); ?> <?php echo JHTML::_('Email.cloak', $this->item->author->email); ?></span>
                            <?php endif; ?>
                        </p>
                        <!-- K2 Plugins: K2UserDisplay -->
                        <?php echo $this->item->event->K2UserDisplay; ?>
                    
                    </div>

                </div>
            <?php endif; ?>
            <!-- Author end //-->

            <div class="clearfix"></div>
        </div>

        <!-- Related start //-->
        <?php if($this->item->params->get('itemRelated') && isset($this->relatedItems)): ?>
        <div class="row">
            <!-- Related items by tag -->
            <div class="section-title black text-left">
                <h2 class="title"><?php echo JText::_('TPL_MIST_RELATED_POSTS_TEXT');?></h2>
            </div>
            <?php if($this->relatedItems and count($this->relatedItems)):?>
            <div class="row">
                <div class="owl-carousel navigation-1" data-pagination="false" data-items="4" data-autoplay="true" data-navigation="true">
                <?php foreach($this->relatedItems as $key=>$item): ?>
                    <!-- Related post item //-->
                    <?php 
                        $extraFieldsRelated = array();

                        if($item->extra_fields){
                            if(!is_array($item->extra_fields)){
                                $extraFieldsRelated = json_decode($item->extra_fields);
                            }else{
                                $extraFieldsRelated = $item->extra_fields;
                            }
                        }
                    ?>
                    <div class="col-sm-12">
                        <?php if(!empty($extraFieldsRelated[1]->value)): ?>
                        <p class="text-center opacity">
                            <img width="370" height="185" alt="" src="<?php echo JURI::root(true).$extraFieldsRelated[1]->value; ?>" />
                        </p>
                        <?php endif; ?>
                        <h6>
                            <a href="<?php echo $item->link ?>"><?php echo $item->title; ?></a>
                        </h6>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
            <?php endif;?>
        </div>
        <?php endif; ?>
        <!-- Related end //-->
        <div class="clearfix"></div>

        <!-- Plugins: AfterDisplay -->
        <?php echo $this->item->event->AfterDisplay; ?>

        <!-- K2 Plugins: K2AfterDisplay -->
        <?php echo $this->item->event->K2AfterDisplay; ?>

        <?php if($this->item->params->get('itemComments') && ( ($this->item->params->get('comments') == '2' && !$this->user->guest) || ($this->item->params->get('comments') == '1'))): ?>
            <!-- K2 Plugins: K2CommentsBlock -->
            <?php echo $this->item->event->K2CommentsBlock; ?>
        <?php endif; ?>

        <?php if($this->item->params->get('itemComments') && ($this->item->params->get('comments') == '1' || ($this->item->params->get('comments') == '2')) && empty($this->item->event->K2CommentsBlock)): ?>

            <!-- Item comments -->
            <a name="itemCommentsAnchor" id="itemCommentsAnchor"></a>
            <?php if($this->item->params->get('commentsFormPosition')=='above' && $this->item->params->get('itemComments') && !JRequest::getInt('print') && ($this->item->params->get('comments') == '1' || ($this->item->params->get('comments') == '2' && K2HelperPermissions::canAddComment($this->item->catid)))): ?>
                <!-- Item comments form -->
                <!-- <div class="itemCommentsForm"> -->
                    <?php echo $this->loadTemplate('comments_form'); ?>
                <!-- </div> -->
            <?php endif; ?>
            <div class="row">
                <div class="top-pad-20">
                    <h4 style="margin-bottom:0"><?php echo JTEXT::_('TPL_MIST_COMMENTS_TEXT'); ?></h4>
                    <p><strong><?php echo $this->item->numOfComments; ?></strong> <?php echo ($this->item->numOfComments>1) ? JText::_('K2_COMMENTS') : JText::_('K2_COMMENT'); ?></p>
                    <div class="comments-list">
                        <?php if($this->item->numOfComments>0 && $this->item->params->get('itemComments') && ($this->item->params->get('comments') == '1' || ($this->item->params->get('comments') == '2'))): ?>
                        <!-- Item user comments -->
                        
                        <?php foreach ($this->item->comments as $key=>$comment): ?>
                            <!-- Comment item //-->
                            <div class="comment-item">

                                <?php if($comment->userImage): ?>
                                <div class="pull-left author-img"><img class="img-circle" src="<?php echo $comment->userImage; ?>" width="<?php echo $this->item->params->get('commenterImgWidth'); ?>" alt="<?php echo JFilterOutput::cleanText($comment->userName); ?>" title=""></div>
                                <?php endif; ?>

                                <p><?php echo $comment->commentText; ?></p>

                                <?php if($this->inlineCommentsModeration || ($comment->published && ($this->params->get('commentsReporting')=='1' || ($this->params->get('commentsReporting')=='2' && !$this->user->guest)))): ?>
                                <span class="commentToolbar">
                                    <?php if($this->inlineCommentsModeration): ?>
                                    <?php if(!$comment->published): ?>
                                    <a class="commentApproveLink" href="<?php echo JRoute::_('index.php?option=com_k2&view=comments&task=publish&commentID='.$comment->id.'&format=raw')?>"><?php echo JText::_('K2_APPROVE')?></a>
                                    <?php endif; ?>

                                    <a class="commentRemoveLink" href="<?php echo JRoute::_('index.php?option=com_k2&view=comments&task=remove&commentID='.$comment->id.'&format=raw')?>"><?php echo JText::_('K2_REMOVE')?></a>
                                    <?php endif; ?>

                                    <?php if($comment->published && ($this->params->get('commentsReporting')=='1' || ($this->params->get('commentsReporting')=='2' && !$this->user->guest))): ?>
                                    <a class="modal" rel="{handler:'iframe',size:{x:560,y:480}}" href="<?php echo JRoute::_('index.php?option=com_k2&view=comments&task=report&commentID='.$comment->id)?>"><?php echo JText::_('K2_REPORT')?></a>
                                    <?php endif; ?>

                                    <?php if($comment->reportUserLink): ?>
                                    <a class="k2ReportUserButton" href="<?php echo $comment->reportUserLink; ?>"><?php echo JText::_('K2_FLAG_AS_SPAMMER'); ?></a>
                                    <?php endif; ?>
                                </span>
                                <?php endif; ?>

                                <div class="post-meta">
                                    <?php if(!empty($comment->userLink)): ?>
                                    <a href="<?php echo JFilterOutput::cleanText($comment->userLink); ?>" title="<?php echo JFilterOutput::cleanText($comment->userName); ?>" target="_blank" rel="nofollow">
                                        <span class="author"><i class="fa fa-user"></i><?php echo $comment->userName; ?></span>
                                    </a>
                                    <?php else: ?>
                                    <span class="author"><i class="fa fa-user"></i><?php echo $comment->userName; ?></span>
                                    <?php endif; ?>
                                    <!-- Meta Date -->
                                    <span class="time"><i class="fa fa-calendar"></i><?php echo JHTML::_('date', $comment->commentDate, JText::_('CTH_COMMENT_DATE_FORMAT')); ?></span>
                                </div>

                            </div>
                        <?php endforeach; ?>

                        <!-- <div class="itemCommentsPagination"> -->
                        <?php echo $this->pagination->getPagesLinks(); ?>
                        <!-- <div class="cl"></div> -->
                        <!-- </div> -->
                        <?php endif; ?>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <?php if($this->item->params->get('commentsFormPosition')=='below' && $this->item->params->get('itemComments') && !JRequest::getInt('print') && ($this->item->params->get('comments') == '1' || ($this->item->params->get('comments') == '2' && K2HelperPermissions::canAddComment($this->item->catid)))): ?>
                <!-- Item comments form -->
                <!-- <div class="itemCommentsForm"> -->
                    <?php echo $this->loadTemplate('comments_form'); ?>
                <!-- </div> -->
            <?php endif; ?>

            <?php $user = JFactory::getUser(); 
            if ($this->item->params->get('comments') == '2' && $user->guest): ?>
                <div><?php echo JText::_('K2_LOGIN_TO_POST_COMMENTS'); ?></div>
            <?php endif; ?>

          
        <?php endif; ?>

        <?php if($this->item->params->get('itemAuthorLatest') && empty($this->item->created_by_alias) && isset($this->authorLatestItems)): ?>
            <!-- Latest items from author -->
            <div class="row">
            <div class="itemAuthorLatest" style="margin-top: 30px;">
                <h4><?php echo JText::_('K2_LATEST_FROM'); ?> <?php echo $this->item->author->name; ?></h4>
                <ul>
                    <?php foreach($this->authorLatestItems as $key=>$item): ?>
                    <li class="<?php echo ($key%2) ? "odd" : "even"; ?>">
                        <a href="<?php echo $item->link ?>"><?php echo $item->title; ?></a>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <div class="clr"></div>
            </div>
            </div>
        <?php endif; ?>

        <?php if($this->item->params->get('itemVideo') && !empty($this->item->video)): ?>
            <!-- Item video -->
            <a name="itemVideoAnchor" id="itemVideoAnchor"></a>

            <div class="itemVideoBlock">
                <h3><?php echo JText::_('K2_MEDIA'); ?></h3>

                    <?php if($this->item->videoType=='embedded'): ?>
                    <div class="itemVideoEmbedded">
                        <?php echo $this->item->video; ?>
                    </div>
                    <?php else: ?>
                    <span class="itemVideo"><?php echo $this->item->video; ?></span>
                    <?php endif; ?>

                  <?php if($this->item->params->get('itemVideoCaption') && !empty($this->item->video_caption)): ?>
                  <span class="itemVideoCaption"><?php echo $this->item->video_caption; ?></span>
                  <?php endif; ?>

                  <?php if($this->item->params->get('itemVideoCredits') && !empty($this->item->video_credits)): ?>
                  <span class="itemVideoCredits"><?php echo $this->item->video_credits; ?></span>
                  <?php endif; ?>

                  <div class="clr"></div>
              </div>
        <?php endif; ?>

        <?php if($this->item->params->get('itemImageGallery') && !empty($this->item->gallery)): ?>
          <!-- Item image gallery -->
          <a name="itemImageGalleryAnchor" id="itemImageGalleryAnchor"></a>
          <div class="itemImageGallery">
              <h3><?php echo JText::_('K2_IMAGE_GALLERY'); ?></h3>
              <?php echo $this->item->gallery; ?>
          </div>
        <?php endif; ?>

    </div>
</section>


