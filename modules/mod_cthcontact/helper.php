<?php

// no direct access
defined('_JEXEC') or die;

class modCthContactHelper
{
	public static function contactAjax(){
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		$app = JFactory::getApplication();
		$input = $app->input;

		$mailfrom	= $app->getCfg('mailfrom');
		$fromname	= $app->getCfg('fromname');

		$name		= $input->getString('name');
		$website		= $input->getString('website','');
		$email		= JStringPunycode::emailToPunycode($input->getString('email'));

		

		// Set up regular expression strings to evaluate the value of email variable against
		$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
		// Run the preg_match() function on regex against the email address
		if (!preg_match($regex, $email)) {
		    echo json_encode(array("info"=>'error',"msg"=>JText::_('MOD_CTHCONTACT_INVALID_EMAIL_MESSSAGE')));
		    exit();
		}

		$imported = JPluginHelper::importPlugin('captcha');
		if($imported){
			$dispatcher = JEventDispatcher::getInstance();
			$result = $dispatcher->trigger('onCheckAnswer',$input->get('recaptcha_response_field','','string'));
			if(!$result[0]){
				echo json_encode(array("info"=>'error',"msg"=>JText::_('MOD_CTHCONTACT_CONTACT_ERROR_INVALID_CAPTCHA_CODE_TEXT')));	   
				exit();
			}
		}
		
		$body		= $input->getString('message');

		$receiveEmail = JStringPunycode::emailToPunycode($input->getString('receiveEmail'));
		$subject	= $input->getString('subject');
		$thanks	= $input->getString('thanks');

		// Prepare email body
		$prefix = JText::sprintf('MOD_CTHCONTACT_ENQUIRY_TEXT', JUri::base());
		$body	= $prefix."\n".$name.' <'.$email.'>'. ' '. $website. "\r\n\r\n".stripslashes($body);
		$body .= "\n".$thanks;

		$mail = JFactory::getMailer();

		$mail->addRecipient($receiveEmail);
		$mail->setSender(array($mailfrom, $fromname));
		$mail->setSubject($subject);
		$mail->setBody($body);
		$sent = $mail->Send();

		//If we are supposed to copy the sender, do so.

		// check whether email copy function activated
		if ($input->getInt('sendAsCopy') == '1')
		{
			$copytext		= JText::sprintf('MOD_CTHCONTACT_COPYTEXT_OF', $receiveEmail, $sitename);
			$copytext		.= "\r\n\r\n".$body."\n".$thanks;
			$copysubject	= JText::sprintf('MOD_CTHCONTACT_COPYSUBJECT_OF', $subject);

			$mail = JFactory::getMailer();
			$mail->addRecipient($email);
			$mail->setSender(array($mailfrom, $fromname));
			$mail->setSubject($copysubject);
			$mail->setBody($copytext);
			$sent = $mail->Send();
		}

		$mes = (string)$sent;
		if (!($sent instanceof Exception)){
			echo json_encode(array("info"=>'success',"msg"=>$thanks));
		}else{
			echo json_encode(array("info"=>'error',"msg"=>$mes));
		}
		exit();
	}
}