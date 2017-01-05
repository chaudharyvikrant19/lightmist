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
extract(cth_shortcode_atts(array(
   'title' => '',
   'receiveemail'=>'',
   'emailsubject'=>'',
   'thanksmessage'=>'',
   'sendascopy'=>'0',
   'extraclass'=>'',
   'layout'=>''
), $atts));


$classes = '';

$animation_data = self::buildAnimation($atts,'animate');

$classes .= ' '.$animation_data['trigger'];
$animationData = $animation_data['data'];

$contactformstyle = self::buildStyle($atts);

$classes = 'class="'.$classes.'"';

?>
<!--contact form -->

<div <?php echo $classes.' '.$contactformstyle.' '.$animationData;?>>

    <form class="azura_contact-form form-box register-form contact-form" method="post" action="<?php echo JURI::root();?>" name="careers_register_form" id="careers_register_form">
    	<h3 class="title"><?php echo $title; ?></h3>
	    <div id="azuramessage"></div>
	    <input type="text" name="name" class="azura_form-control form-control" id="name" placeholder="<?php echo JText::_('TPL_MIST_CONTACT_NAME_TEXT');?>*">
	    <input type="email" name="email" class="azura_form-control form-control" id="email" placeholder="<?php echo JText::_('TPL_MIST_CONTACT_EMAIL_TEXT');?>*">

	    <div class="row" role="form">
	        <div class="col-md-6">
	        <input type="text" name="age" id="age" class="form-control" placeholder="<?php echo JText::_('TPL_MIST_AGE_TEXT');?>*" /></div>
	        <div class="col-md-6">
	        <input type="text" name="city" id="city" class="form-control" placeholder="<?php echo JText::_('TPL_MIST_CITY_TEXT');?>*" /></div>
	    </div>
	    <input class="form-control" type="text" name="phone" id="phone" placeholder="<?php echo JText::_('TPL_MIST_PHONE_TEXT');?>*" />
	    <div class="row" role="form">
	        <div class="col-md-6">
	        <input type="text" name="expectedsalary" id="expectedsalary" class="form-control" placeholder="<?php echo JText::_('TPL_MIST_EXPECTED_SALARY_TEXT');?>*" /></div>
	        <div class="col-md-6">
	        <input type="text" name="experience" id="experience" class="form-control" placeholder="<?php echo JText::_('TPL_MIST_EXPERIENCE_TEXT');?>*" /></div>
	    </div>
	    <input class="form-control" name="website" type="text" id="website" placeholder="<?php echo JText::_('TPL_MIST_WEBSITE_TEXT');?>" /> 
	    <textarea class="form-control" name="comment" id="comment" placeholder="<?php echo JText::_('TPL_MIST_ORTHER_DETAILS_TEXT');?>*"></textarea>
	    <div class="clearfix"></div>
	    <?php if($sendascopy === '1') :?> 
        
            <label class="azura_checkbox-inline" for="sendascopy">
            <input type="checkbox" value="1" id="sendascopy"  name="sendAsCopy">
            <?php echo JText::_('TPL_MIST_SEND_AS_A_COPY_TEXT');?></label>
            <div style="margin-bottom: 15px;"></div>
        
        <?php endif;?>
        <?php
        JPluginHelper::importPlugin('captcha');
        $dispatcher = JEventDispatcher::getInstance();
        $dispatcher->trigger('onInit','dynamic_recaptcha_1');
        ?>
        <div id="dynamic_recaptcha_1"></div>
        <button id="register_submit" type="submit" class="btn btn-default"><?php echo JText::_('TPL_MIST_SUBMIT_TEXT');?></button>
	
        <input type="hidden" name="receiveEmail" value="<?php echo $receiveemail;?>">
		<input type="hidden" name="thanks" value="<?php echo $thanksmessage;?>">
		<input type="hidden" name="option" value="com_azurapagebuilder">
		<input type="hidden" name="task" value="contact.careerregister">
		<?php echo JHtml::_('form.token'); ?>

	</form>
</div>
<script type="text/javascript">
jQuery(document).ready(function($){

    /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
    /* contact form init  */
    /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
        $('#careers_register_form').submit(function(){
        var name=$('input[name=name]').val();
        var email=$('input[name=email]').val();
        var age=$('input[name=age]').val();
        var city=$('input[name=city]').val();
        var phone=$('input[name=phone]').val();
        var expectedsalary=$('input[name=expectedsalary]').val();
        var experience=$('input[name=experience]').val();
        var comment=$('textarea[name=comment]').val();
        
        $("#azuramessage").show();
        var proceed=true;
            if(name.trim()==""){
                $('#azuramessage').html('<span style="color:red">Enter your name.</span>' );
                proceed=false;
            }
            else if(email.trim()==""){
                $('#azuramessage').html('<span style="color:red">Enter your email.</span>' );
                proceed=false;
            }
            else if(age.trim()==""){
                $('#azuramessage').html('<span style="color:red">Enter your age.</span>' );
                proceed=false;
            }
            else if(city.trim()==""){
                $('#azuramessage').html('<span style="color:red">Enter your city.</span>' );
                proceed=false;
            }
            else if(phone.trim()==""){
                $('#azuramessage').html('<span style="color:red">Enter your phone number.</span>' );
                proceed=false;
            }
            else if(expectedsalary.trim()==""){
                $('#azuramessage').html('<span style="color:red">Enter your expectedsalary.</span>' );
                proceed=false;
            }
            else if(experience.trim()==""){
                $('#azuramessage').html('<span style="color:red">Enter your experience.</span>' );
                proceed=false;
            }
            else if(comment.trim()==""){
                $('#azuramessage').html('<span style="color:red">Enter your comment.</span>' );
                proceed=false;
            }
        if(proceed){
            $('#azuramessage').hide();
            var action = $(this).attr('action');
            $("#azuramessage").slideUp(300,function() {
            $('#azuramessage').hide();
            $('#register_submit').attr('disabled','disabled');
            $.post(
                action,
                $('#careers_register_form').serialize(),
                function(data){
                    console.log(data);
                    document.getElementById('azuramessage').innerHTML = data.msg;
                    $('#azuramessage').slideDown('slow');
                    $('#register_submit').removeAttr('disabled');
                    if(data.info == 'success'){
                        //$('#careers_register_form').slideUp('slow');
                        $('#azuramessage').css({'color':'black','font-size':'16px'});
                        $('#name').val("");
                        $('#email').val("");
                        $('#age').val("");
                        $('#city').val("");
                        $('#phone').val("");
                        $('#experience').val("");
                        $('#expectedsalary').val("");
                        $('#website').val("");
                        $('#comment').val("");
                    }
                    else{
                        $('#azuramessage').css({'color':'red','font-size':'16px'});
                    }
                },
                
                'json'
            );

        });
        }
        return false;
        
    });
    
    
});
</script>
	