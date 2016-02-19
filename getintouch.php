<?php

/**
 * @author 
 * @copyright 2013
 */

class contactus
	{
		public function sendMail()
			{
				
				$name = $_GET['contactname'];
				$mail = $_GET['contactemailid'];
				
				/*$message = '<span>Name :'.$_GET['contactname'].'</span>';
				$message .= 'MailId :'.$_GET['mailid'];
				$message .= 'country :'.$_GET['country'];
				$message .= 'Phone No :'.$_GET['phone'];
				$message .= 'Message :'.$_GET['message'];*/
				$mailHeader  = "From:".$mail." <".$mail."> \n" ;
				$mailHeader .= "X-Sender:". $mail." \n";
				$mailHeader .= "Reply-To: ".$name." <".$mail."> \n";
				$mailHeader .= "Content-Type: text/html; charset=iso-8859-1 \n";
				$mailHeader .= "Return-Path:".$mail." \n";
				$mailHeader .= "Error-To: ".$mail." \n";
				$mailHeader .= "X-Mailer: ".$_SERVER['SERVER_NAME']." \n";
				$mailHeader .= "MIME-Version: 1.0 \n";
				$to  = 'sepici@hizlisayfalar.com';
				$subject = 'Contact Us Immediately';
				$message = '<table cellpadding="5" cellspacing="10" style="font:normal 14px/17px verdana;"><tr><td>Name</td><td>:</td><td>'.$_GET['contactname'].'</td></tr><tr><td>MailId</td><td>:</td><td style="color:blue; cursor:poiter;">'.$_GET['contactemailid'].'</td></tr><tr><td>Phone No</td><td>:</td><td>'.$_GET['contactphone'].'</td></tr><tr><td>City</td><td>:</td><td>'.$_GET['contactsuburb'].'</td></tr><tr><td>State</td><td>:</td><td>'.$_GET['contactstate'].'</td></tr><tr><td>Message</td><td>:</td><td>'.$_GET['contactmessage'].'</td></tr></table>';
                mail($to,$subject,$message,$mailHeader);
				echo "Success";
			}
	}
$contact = new contactus;
if($_GET['contactname'])
	{
		$contact->sendMail();
	}
?>