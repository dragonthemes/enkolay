<?php

/**
 * @author kathirvel 
 * @copyright 2013
 */

include("includes/config.inc.php");
$objSite->languageSession();
$objCommon->userAuthendication();

#.............................................................................................
	$objCommon->user_unauthetic();
	$objCommon->getDetails();	
    global $_lang;
	if($_POST['invitefriends'] && !empty($_POST['to']))
		{
			//$email_arr = explode(',',substr($_POST['to'],0,-1));
			$wholevalue =  $_POST['to'].',';
			$wholevalue_one = str_replace(',,',',',$wholevalue);
			$email_arr = explode(',',substr($wholevalue_one,0,-1));
			foreach($email_arr as $value)
				{
					$all = $objCommon->chkIsEmailOrNot($value);
					$alreadyemail = $objCommon->chkIsEmailAlreadyInReg($value);
                    $alreadyrefered=$objCommon->chkAlreadyRefered($value);
				}
             if($alreadyrefered == '')
                {
    			if($alreadyemail == '')
    				{
    					if($all)
    						{
    					 		$mailsubject = $_lang['email_invite_sub1'].''. $CFG['site']['site_main_domain'].' '.$_lang['email_invite_sub1'];
                                $mailsubject1='Reference';
                             	$mail_content = 'Your friend refer you to create a new website or blog in the'. $CFG['site']['site_main_domain'];
    							foreach($email_arr as $value)
    								{
    									$objCommon->insertReferDetails($value,$mailsubject,$mail_content);
    									$username=$objCommon->getUserName($_SESSION['user_id']);
                                        $email=$objSite->getValue('admin_email',$CFG['table']['sitesetting'],"domain_id = '1'");
                                       	$mail_body = $objCommon->readfilecontent($CFG['site']['emailtpl_path']."/emailInviteDetails.tpl"); 
    							        $mail_body = str_replace('{USERNAME}',$username,$mail_body);	    
    									$mail_body = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_body);  
                                        $mail_body = str_replace('{SITE_TITLE}',$CFG['site']['site_main_domain'],$mail_body);
                                        $mail_body = str_replace('{SITE_MAIN_DOMAIN}',$CFG['site']['site_main_domain'],$mail_body);
    								 	$ok=$objCommon->sendMail($CFG['site']['sitename'],$_POST['fromemail'],$value,$mailsubject,$mail_body);	
                                        if($ok)
                                            {
                                                $mail_content1 = $objCommon->readfilecontent($CFG['site']['emailtpl_path']."/emailInviteToSiteOwner.tpl"); 
    							                $mail_content1 = str_replace('{USERNAME}',$username,$mail_content1);
                                                $mail_content1 = str_replace('{REFERED_EMAIL}',$value,$mail_content1);	    
    									        $mail_content1 = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_content1);  
                                                $mail_content1 = str_replace('{SITE_TITLE}',$CFG['site']['site_main_domain'],$mail_content1);
                                                $mail_content1 = str_replace('{SITE_MAIN_DOMAIN}',$CFG['site']['site_main_domain'],$mail_content1);
    									        $objCommon->sendMail($CFG['site']['sitename'],$_POST['fromemail'],$email,$mailsubject1,$mail_content1);
                                            }
                                            
                                          
    								}
    							$objSmarty->assign('successmsg','Mail Sent Successfully');	
    						}
    					else
    						{
    						 	$objSmarty->assign('errormessage','InValid Email Given');
    						}
    				}
    			else
    				{
    					$objSmarty->assign('errormessage',$alreadyemail.' zaten '. $CFG['site']['site_main_domain'].' veritabanına kayıtlıdır');
    				}
                }
            else
                {
                    $objSmarty->assign('errormessage', 'Yakın zamanda '. $alreadyrefered.' adresine davetiye göndermişsiniz. Henüz  '.$alreadyrefered.' adresine tekrar davetiye göndermek için çok erken.');
                } 
			
		}
	$objCommon->getRefereDetails();
	$objCommon->getInvitesUrl();	
	
#.............................................................................................
$main_content = $objSmarty->fetch('myinvites.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('main.tpl');

?>