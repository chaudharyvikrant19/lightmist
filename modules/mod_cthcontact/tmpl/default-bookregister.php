<?php 

defined('_JEXEC') or die;

?>
<?php if(!empty($introduction)) :?>
    <p><?php echo $introduction;?></p>
<?php endif;?>
<?php if(!empty($title)) :?>
    <h3><?php echo $title;?></h3>
<?php endif;?>

<form id="bookregister_form" class="register-form contact-form form-inline" method="post" action="<?php echo JURI::root();?>" enctype="multipart/form-data">
    <div class="col-sm-3">
        <input type="text" placeholder="<?php echo JText::_('TPL_MIST_BOOK_REGISTER_NAME_TEXT');?>" name="name" class="form-control">
    </div>
    <div class="col-sm-3">
        <input type="email" placeholder="<?php echo JText::_('TPL_MIST_BOOK_REGISTER_EMAIL_TEXT');?>" name="email" class="form-control">
    </div>
    <div class="col-sm-3">
        <input type="text" placeholder="<?php echo JText::_('TPL_MIST_BOOK_REGISTER_PHONE_TEXT');?>" name="phone" class="form-control">
    </div>
    <div class="col-sm-3">
        <input type="submit" class="btn btn-default" name="submit" value="<?php echo JText::_('TPL_MIST_BOOK_REGISTER_REGISTER_TEXT');?>" id="bookregister_submit" >
    </div>
    <div style="clear:both;"></div>
    <?php
    JPluginHelper::importPlugin('captcha');
    $dispatcher = JEventDispatcher::getInstance();
    $dispatcher->trigger('onInit','dynamic_recaptcha_2');
    ?>
    <div id="dynamic_recaptcha_2"></div>
    <div style="clear:both;margin-bottom: 10px;"></div>
    
    <input type="hidden" name="receiveEmail" value="<?php echo $email;?>">
    <input type="hidden" name="subject" value="<?php echo $subject;?>">
    <input type="hidden" name="thanks" value="<?php echo $thanks;?>">
    <input type="hidden" name="option" value="com_azurapagebuilder">
    <input type="hidden" name="task" value="contact.bookregister">
    <?php echo JHtml::_('form.token'); ?>
</form>
<span id="subscribe_response_div"></span>
<script type="text/javascript">
jQuery(document).ready(function($){

    /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
    /* contact form init  */
    /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
        $('#bookregister_form').submit(function(){
        var name=$('input[name=name]').val();
        var email=$('input[name=email]').val();
        $("#subscribe_response_div").show();
        var proceed=true;
            if(name.trim()==""){
                $('#subscribe_response_div').html('<span style="color:red">Enter your name.</span>' );
                proceed=false;
            }
            else if(email.trim()==""){
                $('#subscribe_response_div').html('<span style="color:red">Enter your email.</span>' );
                proceed=false;
            }
        if(proceed){
            $('#subscribe_response_div').hide();
            var action = $(this).attr('action');
            $("#subscribe_response_div").slideUp(300,function() {
            $('#subscribe_response_div').hide();
            $('#bookregister_submit')
                .attr('disabled','disabled');
            $.post(
                action,
                $('#bookregister_form').serialize(),
                function(data){
                    console.log(data);
                    document.getElementById('subscribe_response_div').innerHTML = data.msg;
                    $('#subscribe_response_div').slideDown('slow');
                    $('#bookregister_submit').removeAttr('disabled');
                    if(data.info == 'success'){
                        $('#bookregister_form').slideUp('slow');
                        $('#subscribe_response_div').css({'color':'black','font-size':'16px'});
                        $('#name').val("");
                        $('#email').val("");
                        $('#phone').val("");
                    }
                    else{
                        $('#subscribe_response_div').css({'color':'red','font-size':'16px'});
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