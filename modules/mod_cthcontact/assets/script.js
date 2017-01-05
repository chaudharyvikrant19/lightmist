jQuery(document).ready(function($){
    jQuery('.cthcontact_contactform').each(function(index){
            var $contact = jQuery(this);
            
            $contact.find('form').submit(function(){
                //alert(1);
                var $form = jQuery(this);
                var action = $form.attr('action');
                
                var name = $contact.find('input[name="name"]').val();
                var email = $contact.find('input[name="email"]').val();
                var message = $contact.find('textarea[name="message"]').val();

                $contact.find(".cthmessage").slideUp(300);

                if(name == ''){
                    $contact.find(".cthmessage").html('Please enter your name');
                    $contact.find(".cthmessage").slideDown(300);
                    $contact.find('input[name="name"]').focus();
                    return false;
                }

                if(email == ''){
                    $contact.find(".cthmessage").html('Please enter your email');
                    $contact.find(".cthmessage").slideDown(300);
                    $contact.find('input[name="email"]').focus();
                    return false;
                }

                if(message == ''){
                    $contact.find(".cthmessage").html('Please enter your message');
                    $contact.find(".cthmessage").slideDown(300);
                    $contact.find('textarea[name="message"]').focus();
                    return false;
                }

                $contact.find(".cthmessage").slideUp(300,function() {
                    $contact.find('.cthmessage').hide();
                    $contact.find('.cthsubmit')
                        .attr('disabled','disabled');
                    jQuery.post(
                        action,
                        $form.serialize(),
                        function(data){
                            //console.log(data);
                            $contact.find('.cthmessage').html(data.msg);
                            $contact.find('.cthmessage').slideDown('slow');
                            $contact.find('.cthsubmit').removeAttr('disabled');
                            if(data.info == 'success'){
                                $contact.find('.cthmessage').addClass('success');
                                $form.slideUp('slow');
                            }
                        },
                        
                        'json'
                    );

                });

                return false;

            });
        });
});