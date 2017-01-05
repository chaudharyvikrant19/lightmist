<?php 

defined('_JEXEC') or die;
$doc = JFactory::getDocument();
$doc->addScript(JURI::root(true).'/modules/mod_cthcontact/assets/script.js');

?>
<div class="cthcontact_contactform contact-form <?php echo $moduleclass_sfx; ?>">
    <div class="cth_message_wrapper">
        <div class="cthmessage"></div>
    </div>
    <form action="<?php echo JURI::root();?>" method="post" role="form" name="cthcontactform">
        <div class="col-md-6">
            <div class="input-text form-group">
                <input type="text" name="name" class="input-name form-control" placeholder="<?php echo JText::_('TPL_MIST_YOUR_NAME_TEXT');?>"/>
            </div>
            <div class="input-email form-group">
                <input type="email" name="email" class="input-email form-control" placeholder="<?php echo JText::_('TPL_MIST_YOUR_EMAIL_TEXT');?>"/>
            </div>
            <div class="input-email form-group">
                <input type="text" name="phone" class="input-phone form-control" placeholder="<?php echo JText::_('TPL_MIST_YOUR_PHONE_TEXT');?>"/>
            </div>
            <?php if($showwebsite === '1') :?> 
            <div class="input-text form-group">
                <input type="text" name="website" class="input-name form-control" placeholder="<?php echo JText::_('TPL_MIST_YOUR_WEBSITE_TEXT');?>"/>
            </div>
            <?php endif;?>
        </div>
        <div class="col-md-6">
            <div class="textarea-message form-group">
                <textarea name="message" class="textarea-message height-82 form-control" placeholder="<?php echo JText::_('TPL_MIST_YOUR_MESSAGE_TEXT');?>" rows="2" ></textarea>
            </div>
            
            <?php if($ascopy === '1') :?> 
                
            <p>
                <label class="checkbox-inline" for="sendascopy">
                    <input type="checkbox" value="1" name="sendAsCopy">
                    <?php echo JText::_('MOD_AZURAPAGEBUILDER_SEND_AS_A_COPY_TEXT');?>
                </label>
            </p>
            
            <?php endif;?>


            <?php
            JPluginHelper::importPlugin('captcha');
            $dispatcher = JEventDispatcher::getInstance();
            $dispatcher->trigger('onInit','dynamic_recaptcha_1');
            ?>
            <div id="dynamic_recaptcha_1"></div>
            <button type="submit" class="cthsubmit btn btn-default btn-block" ><?php echo JText::_('TPL_MIST_SEND_MESSAGE_TEXT');?><i class="icon-paper-plane"></i></button>
        </div>
        <input type="hidden" name="receiveEmail" value="<?php echo $email;?>">
        <input type="hidden" name="subject" value="<?php echo $subject;?>">
        <input type="hidden" name="thanks" value="<?php echo $thanks;?>">
        <input type="hidden" name="option" value="com_ajax">
        <!-- <input type="hidden" name="task" value="contact.sendemail"> -->
        <input type="hidden" name="module" value="cthcontact">
        <input type="hidden" name="format" value="json">
        <input type="hidden" name="method" value="contact">
        <?php echo JHtml::_('form.token'); ?>
    </form>
</div>