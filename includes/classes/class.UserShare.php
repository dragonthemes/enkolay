<?php

class UserShare extends Site{	
	public $logemail;
		
	function UserShare(){
				
		if(array_key_exists("logemail", $_POST)) {
	 			$this->logemail = $_POST['logemail'];
		}
		if(array_key_exists("customername",$_POST)){
			$this->customername = $_POST['customername'];
		}
		if(array_key_exists("customeraddress",$_POST)){
			$this->customeraddress = $_POST['customeraddress'];
		}
		if(array_key_exists("aboutme",$_POST)){
			$this->aboutme = $_POST['aboutme'];
		}		
	}
		
	#-------------------------------------------------------------------------------------------------------------------
	#Login Through Face Book
	function loginFacebook()
		{		
			global $CFG,$objSmarty;		
			$num_customer = $this->getNumValues($CFG['table']['register'],"email = '".$this->filterInput($this->logemail)."' AND log_status ='2' ");
		
			if($num_customer > 0)
				{
					$customerId = $this->getValue("user_id",$CFG['table']['register'],"email = '".$this->filterInput($this->logemail)."' ");
					
					$_SESSION['user_id'] = $customerId;
					$_SESSION['userLogin'] = 'FB';
					
					echo "loginSuccess";	
				}
			else
				{
					$this->customerpassword = rand();
					$ins_cus = "INSERT INTO 
										".$CFG['table']['register']."
								    SET
								    	username  			= '".$this->filterInput($this->customername)."',
								    	email  				= '".$this->filterInput($this->logemail)."',
								    	password  			= '".$this->filterInput($this->customerpassword)."',
								    	log_status			= '2',
								    	addeddate 			= now()";
					$res_cus = $this->ExecuteQuery($ins_cus,'insert');
					$_SESSION['user_id'] = $res_cus;
					$_SESSION['userLogin'] = 'FB';
								
					$fromname = $CFG['site']['adminname'];
					$fromemail = $CFG['site']['adminemail'];
					$toemail  = $this->logemail;
				
				if($res_cus){
					if($CFG['site']['userfriendly'] == 'Y'){
						$path =  $CFG['site']['base_url']."/index.php";
					}else{
						//$path =  $CFG['site']['base_url'].'/main.php?user_id='.base64_encode($res_ins);
						$path =  $CFG['site']['base_url'].'/index.php';
					}
							
					$url_first				=$path;		
					$url		=	$url_first;
					$mailsubject  = $CFG['site']['sitename']." Registration Details ";
					$mail_content = $this->readfilecontent($CFG['site']['emailtpl_path']."/emailLoginThrFacebook.tpl");
					$mail_content = str_replace('{SITE_URL}',$CFG['site']['base_url'],$mail_content);
			        $mail_content = str_replace('{STATUS}','Hi '.$this->customername. ',',$mail_content);
			        $mail_content = str_replace('{INFO}','You have been successfully registered in our site,',$mail_content);
			        $mail_content = str_replace('{SITE_TITLE}',$CFG['site']['sitename'],$mail_content);
			        $mail_content = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_content);
			        $mail_content = str_replace('{INVITE_URL}',$CFG['site']['base_url'].'/images/inviitemail.png',$mail_content);
			        $mail_content = str_replace('{USERNAME}',$this->customername,$mail_content);
			        $mail_content = str_replace('{EMAIL}',$this->logemail,$mail_content);
			        $mail_content = str_replace('{PASSWORD}',$this->customerpassword,$mail_content);
			        $mail_content = str_replace('{DETAILS}','Your Details Below',$mail_content);
			        $mail_content = str_replace('{ADMIN}','Admin',$mail_content); 
                    $mail_content = str_replace('{SITE_MAIN_DOMAIN}','SITE_MAIN_DOMAIN',$mail_content); 
					$ok=$this->sendMail($fromname,$fromemail,$toemail,$mailsubject,$mail_content);
                    if($ok)
                        {
                            $mail_body = $this->readfilecontent($CFG['site']['emailtpl_path']."/emailLoginThrFacebookToAdmin.tpl");
        					$mail_body = str_replace('{SITE_URL}',$CFG['site']['base_url'],$mail_body);
        			        $mail_body = str_replace('{STATUS}','Hi Admin, ',$mail_body);
        			        $mail_body = str_replace('{INFO}',' have been successfully registered in your site,',$mail_body);
        			        $mail_body = str_replace('{SITE_TITLE}',$CFG['site']['sitename'],$mail_body);
        			        $mail_body = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_body);
        			        $mail_body = str_replace('{INVITE_URL}',$CFG['site']['base_url'].'/images/inviitemail.png',$mail_body);
        			        $mail_body = str_replace('{USERNAME}',$this->customername,$mail_body);
        			        $mail_body = str_replace('{EMAIL}',$this->logemail,$mail_body);
        			        $mail_body = str_replace('{PASSWORD}',$this->customerpassword,$mail_body);
        			        $mail_body = str_replace('{DETAILS}','User Details Below',$mail_body);
        			        $mail_body = str_replace('{ADMIN}','Admin',$mail_body); 
                            $ok=$this->sendMail($CFG['site']['sitename'],$toemail,$fromemail,$mailsubject,$mail_body);
                        }
					echo "signupSuccess";
				}
			}
	}
	
	//kathir code for the twitter login 
	function twitterLogin($user_info)
		{
			global $CFG,$objSmarty;
			$num_customer = $this->getNumValues($CFG['table']['register'],"email = '".$this->filterInput($user_info->logemail)."' AND log_status ='2' ");
			if($num_customer > 0)
				{
					$customerId = $this->getValue("user_id",$CFG['table']['register'],"email = '".$this->filterInput($user_info->logemail)."' ");
					
					$_SESSION['user_id'] = $customerId;
					$_SESSION['userLogin'] = 'TW';
					
					if($CFG['site']['userfriendly'] == 'Y')
						{
							$this->redirectUrl($CFG['site']['base_url']."/myaccount");
						}
					else
						{
							$this->redirectUrl($CFG['site']['base_url'].'/myAccount.php');
						}	
				}
			else
				{
					$this->customerpassword = rand();
					$ins_cus = "INSERT INTO 
										".$CFG['table']['register']."
								    SET
								    	username  			= '".$this->filterInput($user_info->name)."',
								    	email  				= '".$this->filterInput($user_info->logemail)."',
								    	password  			= '".$this->filterInput($this->customerpassword)."',
								    	domain_id  			= '".$CFG['site']['domain_id']."',
								    	address				= '".$this->filterInput($user_info->location)."',
								    	aboutme				= '".$this->filterInput($user_info->description)."',
								    	addeddate 			= now()";
					$res_cus = $this->ExecuteQuery($ins_cus,'insert');
					$_SESSION['user_id'] = $res_cus;
					$_SESSION['userLogin'] = 'TW';
								
					$fromname = $CFG['site']['adminname'];
					$fromemail = $CFG['site']['adminemail'];
					$toemail  = $user_info->logemail;			
					if($res_cus)
						{
							if($CFG['site']['userfriendly'] == 'Y')
								{
									$path =  $CFG['site']['base_url']."/thanks";
								}
							else
								{
									$path =  $CFG['site']['base_url'].'/thanks.php';
								}
							$url_first				=$path;		
							$url		=	$url_first."?user_id=".base64_encode($res_cus);
							
							$mailsubject  = $CFG['site']['sitename']." Registration Details ";
							$mail_content = $this->readfilecontent($CFG['site']['emailtpl_path']."/emailLoginThrFacebook.tpl");
					        $mail_content = str_replace('{SITE_URL}',$CFG['site']['base_url'],$mail_content);
					        $mail_content = str_replace('{STATUS}','Hi,Thanks for registration with us.,',$mail_content);
					        $mail_content = str_replace('{SITE_TITLE}',$CFG['site']['sitename'],$mail_content);
					        $mail_content = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_content);
					        $mail_content = str_replace('{URL}',$url,$mail_content);
					        $mail_content = str_replace('{USERNAME}',$user_info->logemail,$mail_content);
					        $mail_content = str_replace('{PASSWORD}',$this->customerpassword,$mail_content);
					        $mail_content = str_replace('{ADMIN}','Admin',$mail_content); 
                            $mail_content = str_replace('{SITE_MAIN_DOMAIN}',$CFG['site']['site_main_domain'],$mail_content); 
		    				$ok=$this->sendMail($fromname,$fromemail,$toemail,$mailsubject,$mail_content);			
							if($CFG['site']['userfriendly'] == 'Y')
								{
									$this->redirectUrl($CFG['site']['base_url']."/myaccount");
								}
							else
								{
									$this->redirectUrl($CFG['site']['base_url'].'/myAccount.php');
								}	
						}
				}
		}
	//end fo kathir coding
	
	//kathir coding for g+login insertion
	
		function googleLoginInsertion()
			{
				global $CFG,$objSmarty;
				$email = $_GET['openid_ext1_value_email'];
				$firstname = $_GET['openid_ext1_value_firstname'];
				$lastname = $_GET['openid_ext1_value_lastname'];
				$address = '';
				$aboutme = '';
				$num_customer = $this->getNumValues($CFG['table']['register'],"email = '".$this->filterInput($email)."' AND log_status ='2' ");
				if($num_customer > 0)
					{
						$customerId = $this->getValue("user_id",$CFG['table']['register'],"email = '".$this->filterInput($email)."' ");
						
						$_SESSION['user_id'] = $customerId;
						$_SESSION['userLogin'] = 'g';
						
						if($CFG['site']['userfriendly'] == 'Y')
							{
								$this->redirectUrl($CFG['site']['base_url']."/myaccount");
							}
						else
							{
								$this->redirectUrl($CFG['site']['base_url'].'/myAccount.php');
							}	
					}
				else
					{
						$this->customerpassword = rand();
						$ins_cus = "INSERT INTO 
											".$CFG['table']['register']."
									    SET
									    	username  			= '".$this->filterInput($firstname)."',
									    	email  				= '".$this->filterInput($email)."',
									    	password  			= '".$this->filterInput($this->customerpassword)."',
									    	domain_id  			= '".$this->filterInput($CFG['site']['domain_id'])."',
									    	address				= '".$this->filterInput($address)."',
									    	aboutme				= '".$this->filterInput($aboutme)."',
									    	addeddate 			= now()";
						$res_cus = $this->ExecuteQuery($ins_cus,'insert');
						$_SESSION['user_id'] = $res_cus;
						$_SESSION['userLogin'] = 'g';
									
						$fromname = $CFG['site']['adminname'];
						$fromemail = $CFG['site']['adminemail'];
						
						if($res_cus)
							{
								if($CFG['site']['userfriendly'] == 'Y')
									{
										$path =  $CFG['site']['base_url']."/thanks";
									}
								else
									{
										$path =  $CFG['site']['base_url'].'/thanks.php';
									}
								$url_first	  = $path;		
								$url		  =	$url_first."?user_id=".base64_encode($res_cus);								
								$mailsubject  = $CFG['site']['sitename']." Registration Details ";
								$mail_content = $this->readfilecontent($CFG['site']['emailtpl_path']."/emailLoginThrFacebook.tpl");
						        $mail_content = str_replace('{SITE_URL}',$CFG['site']['base_url'],$mail_content);
						        $mail_content = str_replace('{STATUS}','Hi,Thanks for registration with us.,',$mail_content);
						        $mail_content = str_replace('{SITE_TITLE}',$CFG['site']['sitename'],$mail_content);
						        $mail_content = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_content);
						        $mail_content = str_replace('{URL}',$url,$mail_content);
						        $mail_content = str_replace('{USERNAME}',$email,$mail_content);
						        $mail_content = str_replace('{PASSWORD}',$this->customerpassword,$mail_content);
						        $mail_content = str_replace('{ADMIN}','Admin',$mail_content); 
			    				$ok           = $this->sendMail($fromname,$fromemail,$email,$mailsubject,$mail_content);
			    				
			    				if($CFG['site']['userfriendly'] == 'Y')
									{
										$this->redirectUrl($CFG['site']['base_url']."/myaccount");
									}
								else
									{
										$this->redirectUrl($CFG['site']['base_url'].'/myAccount.php');
									}	
							}
					}
			}
	//ends
}
?>