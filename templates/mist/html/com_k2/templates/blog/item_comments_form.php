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
?>

<!-- Respond form -->
<div class="row"><h4><?php echo JText::_('TPL_MIST_LEAVE_A_REAPLY_TEXT') ?></h4></div>
<!-- Form -->
<div class="row">
    <form action="<?php echo JURI::root(); ?>" method="post" id="comment-form" class="comment-form" name="comment-form">
        <?php if($this->params->get('commentsFormNotes')): ?>
        <p class="comment-notes">
            <?php if($this->params->get('commentsFormNotesText')): ?>
            <?php echo nl2br($this->params->get('commentsFormNotesText')); ?>
            <?php else: ?>
            <?php echo JText::_('K2_COMMENT_FORM_NOTES') ?>
            <?php endif; ?>
        </p>
        <?php endif; ?>
        <div class="col-md-6 row">
            <div class="input-text form-group">
                <input name="userName" id="userName" class="input-name form-control" type="text" placeholder="<?php echo JText::_('TPL_MIST_FULL_NAME_TEXT');?>" />
            </div>
            <div class="input-email form-group">
                <input class="comment-input input-email form-control" name="commentEmail" id="commentEmail" type="text" placeholder="<?php echo JText::_('TPL_MIST_EMAIL_TEXT');?>" />
            </div>
        </div>
        <div class="col-md-8 row">
            <div class="textarea-message form-group">
                <textarea name="commentText" id="commentText" class="textarea-message form-control" rows="4" placeholder="<?php echo JText::_('TPL_MIST_MESSAGE_TEXT');?>"></textarea>
            </div>
            <?php if($this->params->get('recaptcha') && ($this->user->guest || $this->params->get('recaptchaForRegistered', 1))): ?>
            <div class="clearfix"></div>
            <label class="formRecaptcha"><?php echo JText::_('K2_ENTER_THE_TWO_WORDS_YOU_SEE_BELOW'); ?></label>
            <div id="recaptcha"></div>
            <div class="clearfix"></div> 
            <?php endif; ?>
            <div>
                <button name="send" id="submitCommentButton" class="btn btn-default" type="submit"><?php echo JText::_('TPL_MIST_SEND_NOW_TEXT') ?><i class="fa fa-paper-plane"></i> </button>
            </div>
            <p><span id="formLog"></span></p>

            <input type="hidden" name="option" value="com_k2" />
            <input type="hidden" name="view" value="item" />
            <input type="hidden" name="task" value="comment" />
            <input type="hidden" name="itemID" value="<?php echo JRequest::getInt('id'); ?>" />
            <?php echo JHTML::_('form.token'); ?>
        </div>
    </form>
</div>


