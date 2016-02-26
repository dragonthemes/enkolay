<?php 
	/*	Class Function for Admin	*/

class Admin extends Site{
	
	public $_header_menu_array = array(	'home'=>array('index.php'),
										'setting'=>array('site_setting.php','recentActivity.php'),
										 'accounts'=>array('admin_change_pwd.php','admin_change_profile.php','transactions.php'),
                                          'domains'=>array('domainManage.php','domainImageManage.php','domainImageTextManage.php','blogDomainManage.php','domainPageListManage.php'),
                                            'contacts'=>array('contactManage.php','contactManageEdit.php','contactListManage'),
                                              'social'=>array('socialManage.php','fansManage.php'),
                                                'controls'=>array('languageManageAdmin.php','languageAddEdit','pricemanage.php','bannerManage.php','bannerManageAdd','thememanage.php','fontManage','fontManageAdd','staticPageManage','staticPageAddEdit.php','backgroundManage','backgroundManageAdd.php','blogManage'),
                                                'payment'=>array('paymentManage.php','paymentEditManage.php')
										   );
										   
	public $_leftNavblueBg = array('index.php');
	public $_leftNavyellowBg = array('site_setting.php','icon_setting.php','admin_change_pwd.php','admin_change_profile.php');
	
	
	#........................................................................................
	#ADMIN AUTHETICATION
	function Admin_Notauthetic(){
		if($_SESSION['adminid']) {
			$this->redirectUrl("index.php");
		}
	}
	#........................................................................................
	#ADMIN NOT AUTHETICATION
	function Admin_authetic(){
			
		if(!$_SESSION['adminid']) {
			$this->redirectUrl("login.php");
		}
	}
	#........................................................................................
	//Admin Login
	function AdminLogout(){
			
		session_destroy();
		unset($_SESSION);
		$this->redirectUrl("login.php");
	}
	#........................................................................................
	//Admin Login
	function chkAdminLogin(){
		global $CFG;
		
		$username	= $this->filterInput($_POST["admin_username"]);
		$Password	= $this->filterInput(md5($_POST["admin_password"]));
		
		$num_admin = $this->getNumvalues($CFG['table']['admin'],"username='".$this->filterInput($username)."' AND password='".$this->filterInput($Password)."' AND log_status = '1'");
		$AdminId   = $this->getValue("admin_id",$CFG['table']['admin'],"username='".$this->filterInput($username)."' AND password='".$this->filterInput($Password)."' AND log_status = '1'");
		
		if($num_admin == 1){
			 
					$_SESSION['adminid'] = $AdminId;
		}
		else{
			echo "Invalid_Login";
			exit();
		}
	}
	
	function removee_directory($dir) {
	   if (is_dir($dir)) {
	     $objects = scandir($dir);
	     foreach ($objects as $object) {
	       if ($object != "." && $object != "..") {
	         if (filetype($dir."/".$object) == "dir") $this->removee_directory($dir."/".$object); else unlink($dir."/".$object);
	       }
	     }
	     reset($objects);
	     rmdir($dir);
	   }
	 }	
	 
	 	#-------------------------------------------------------------------------------------------------
	#For ActiveClass
	function setHeadderActivClass($page)
			{ 
				$objSite = new Site;
				$menu_array = $this->_header_menu_array[$page];
				return (in_array(strtolower($objSite->get_file_name()), $menu_array)) ? 'active' : false;
			}	
			
	#--------------------------------------------------------------------------------------------------------
	#For Sub Menu
	function setHeadderMenuActiv($page)
			{
				$objSite = new Site;
				return (strtolower($objSite->get_file_name()) == strtolower($page)) ?  'active' : false ;
			}
			
	#........................................................................................
 
	#ADMIN CHANGE PWD
	function change_pwd_update_register(){
		global $CFG;
		$old_password = $this->My_addslashes(md5($_POST["old_password"]));
		 
		$new_password = md5($_POST["new_password"]);
	    
		if($this->chkPasswordInAdmin($old_password,$_SESSION['adminid'])){
				$UpQuery  = "UPDATE ".$CFG['table']['admin']." SET password = '".$this->filterInput($new_password)."' WHERE admin_id  = ". $this->filterInput($_SESSION['adminid']);
				$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
			}
		else{	
			echo "Invalid_Old_Pwd";			
			exit();
			}
	}
	
	#.............................................................................................
	function chkPasswordInAdmin($CurPwd,$admin_id){
		global $CFG;
		
		$AdminId   = $this->GetValue("admin_id",$CFG['table']['admin'],"password = '".$this->filterInput($CurPwd)."' AND admin_id  = ".$this->filterInput($_SESSION['adminid'])." LIMIT 0,1");
		if(!empty($AdminId))
		return true;
		else
		return false;
	}
	
	 #........................................................................................
	#DELETE
	function Delete_Admin(){
		global $CFG,$objSmarty;
		
		$sel_id 		= $_POST['checkedvaluesarr'];
		$tablename 		= $_POST['tablename'];
		$upid 			= $_POST['whereField'];
		$filetype		= $_POST['filetype'];		
		
	    if(is_array($sel_id)) {
	        foreach($sel_id as $x => $value){
	        	
	        	#language folder delete
		        #language folder delete
		        if($filetype == 'language'){				
					$langCode = $this->getValue('lang_code',$tablename,$upid .'='. $value);					
					$this->removee_directory($CFG['site']['language_path'].'/'.$langCode);
				}
	        	
	            $sql_user = "DELETE FROM ".$tablename." WHERE ".$upid." = '".$this->filterInput($value)."'";
                $res_user = mysql_query($sql_user) or die($this->mysql_error($sql_user));
	        }
	        echo 'success';exit;
	    }else{
	    	
	    	#language folder delete
	    	if($filetype == 'language'){			
				$langCode = $this->getValue('lang_code',$tablename,$upid .'='. $this->filterInput($_POST['maincateid']));
				$this->removee_directory($CFG['site']['language_path'].'/'.$langCode);
			}
			
			$sql_user = "DELETE FROM ".$tablename." WHERE ".$upid." = '".$this->filterInput($_POST['maincateid'])."' LIMIT 1";
            $res_user = mysql_query($sql_user) or die($this->mysql_error($sql_user));
            echo 'success';exit;
		}		
    }
    
     #.............................................................................................................................
    function changeStatus(){
    	global $CFG;
    	
		$sel_id 		 = $_POST['checkedvaluesarr'];
		$tablename 		 = $_POST['tablename'];
		$filedname 		 = $_POST['fieldname'];
		$changestatusval = $_POST['changestatusval'];
		$upid 			 = $_POST['whereField'];
		
		if($changestatusval == '1')
			{
				$changestatusval == 'Yes';
			}
		else
			{
				$changestatusval == 'No';
			}
		
		if(isset($sel_id) && is_array($sel_id) ) {
	        foreach($sel_id as $x => $value){
	        	
	            $sel_del = "UPDATE ".$tablename." SET ".$filedname." = '".$this->filterInput($changestatusval)."' WHERE ".$upid." = '".$this->filterInput($value)."'";
	            $res_del = mysql_query($sel_del) or die($this->mysql_error($sel_del));
	        }
	        echo 'success';exit;
	    }else{
	    	
			if(isset($_POST['maincateid']) && !empty($_POST['maincateid'])){
				
			 	$sel_del = "UPDATE ".$tablename." SET ".$filedname." = '".$this->filterInput($changestatusval)."' WHERE ".$upid." = '".$this->filterInput($_POST['maincateid'])."'";
	            $res_del = mysql_query($sel_del) or die($this->mysql_error($sel_del));
	            if($filedname == 'lang_site')
	            	{
	            		$sel_del1 = "UPDATE ".$tablename." SET ".$this->filterInput($filedname)." = 'No' WHERE ".$upid." != '".$this->filterInput($_POST['maincateid'])."'";
	            		$res_del1 = mysql_query($sel_del1) or die($this->mysql_error($sel_del));
	            	}
				echo 'success';exit;	
			}			
			
		}
	}
	
	#--------------------------------------------------------------------------------
	#send Mail
	function sendMailForDomainUser()
		{
			global $CFG;
    	    	
    	    $sel_id 	     = $_POST['checkedvaluesarr'];
			$tablename 		 = $_POST['tablename'];
			$filedname 		 = $_POST['fieldname'];
			$changestatusval = $_POST['changestatusval'];
			$upid 			 = $_POST['whereField'];
			$from_name       = $CFG['site']['adminname'];
			$from_email      = $CFG['site']['adminemail'];
			
			if( isset($sel_id) && is_array($sel_id) ) {
		        foreach($sel_id as $x => $value){
		            $to_email= $this->selectEmailFromSighupTable($value);
		            //$sendmail = @mail($to_email,$mailsubject,$mail_content,$mailHeader);
		        	$mailsubject  = $CFG['site']['sitename']." New domain ";
					$mail_content = $this->readfilecontent($CFG['site']['emailtpl_path']."/emailToAllDomainUser.tpl");
			        $mail_content = str_replace('{SITE_TITLE}',$CFG['site']['sitename'],$mail_content);
			        $mail_content = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_content);
			        $mail_content = str_replace('{CONTENT}','Thanks for giving request.,Soon we will contact you.',$mail_content);
			        $mail_content = str_replace('{ADMINNAME}',$CFG['site']['adminname'],$mail_content);
					//echo $mail_content;die();
					$ok=$this->sendMail($from_name,$from_email,$to_email,$mailsubject,$mail_content);
		    	}
		        echo 'success';exit;
		    }		
			
		}
	#-------------------------------------------------------------------------------
	#select email from user table
	function selectEmailFromSighupTable($value)
		{
			global $CFG;
			$sqlsel 	= "SELECT user_id FROM ".$CFG['table']['new_domain']." where newdomainid ='".$this->filterInput($value)."'";
		    $sqlres 	= $this->ExecuteQuery($sqlsel,'select');
		    
		    $sqlsel1 	= "SELECT email FROM ".$CFG['table']['register']." where user_id ='".$this->filterInput($sqlres[0]['user_id'])."'";
		    $sqlres1	= $this->ExecuteQuery($sqlsel1,'select');
		    
		    return $sqlres1[0]['email'];
		}
	function selectPointEmailFromSighupTable($value)
		{
			global $CFG;
			$sqlsel 	= "SELECT user_id FROM ".$CFG['table']['point']." where point_id ='".$this->filterInput($value)."'";
		    $sqlres 	= $this->ExecuteQuery($sqlsel,'select');
		    
		    $sqlsel1 	= "SELECT email FROM ".$CFG['table']['register']." where user_id ='".$this->filterInput($sqlres[0]['user_id'])."'";
		    $sqlres1	= $this->ExecuteQuery($sqlsel1,'select');
		    
		    return $sqlres1[0]['email'];
		}
		#select email from user table
	function selectNameFromSighupTable($value)
		{
			global $CFG;
			$sqlsel 	= "SELECT user_id FROM ".$CFG['table']['new_domain']." where newdomainid ='".$this->filterInput($value)."'";
		    $sqlres 	= $this->ExecuteQuery($sqlsel,'select');
		    
		    $sqlsel1 	= "SELECT username FROM ".$CFG['table']['register']." where user_id ='".$this->filterInput($sqlres[0]['user_id'])."'";
		    $sqlres1	= $this->ExecuteQuery($sqlsel1,'select');
		    
		    return $sqlres1[0]['username'];
		}
		function selectDomainFromSighupTable($value)
		{
			global $CFG;
			$sqlsel 	= "SELECT domain_name FROM ".$CFG['table']['new_domain']." where newdomainid ='".$this->filterInput($value)."'";
		    $sqlres 	= $this->ExecuteQuery($sqlsel,'select');
		   	return $sqlres[0]['domain_name'];
		}
		
		
	function selectPointNameFromSighupTable($value)
		{
			global $CFG;
			$sqlsel 	= "SELECT user_id FROM ".$CFG['table']['point']." where point_id ='".$this->filterInput($value)."'";
		    $sqlres 	= $this->ExecuteQuery($sqlsel,'select');
		    
		    $sqlsel1 	= "SELECT username FROM ".$CFG['table']['register']." where user_id ='".$this->filterInput($sqlres[0]['user_id'])."'";
		    $sqlres1	= $this->ExecuteQuery($sqlsel1,'select');
		    
		    return $sqlres1[0]['username'];
		}
	function selectPointDomainFromSighupTable($value)
		{
			global $CFG;
			$sqlsel 	= "SELECT point_domain FROM ".$CFG['table']['point']." where point_id ='".$this->filterInput($value)."'";
		    $sqlres 	= $this->ExecuteQuery($sqlsel,'select');
		   	return $sqlres[0]['point_domain'];
		}
    	#-------------------------------------------------get blog count for show in dashboard page--------------------------------------------------
	function getBlogCount()
		{
			global $CFG;
			global $objSmarty;
			$sql_qry = "SELECT count(blog_id) as blog_count FROM ".$CFG['table']['domaindetails']." WHERE blog_id != '0'";
		  	$res_qry = $this->ExecuteQuery($sql_qry,'select');
		  	return $res_qry[0]['blog_count'];
		}
		#-------------------------------------------------get Users count for show in dashboard page--------------------------------------------------
	function getUsersCount()
		{
			global $CFG;
			global $objSmarty;
			$sql_qry = "SELECT count(user_id) as user_count FROM ".$CFG['table']['register']."";
		  	$res_qry = $this->ExecuteQuery($sql_qry,'select');
		  	return $res_qry[0]['user_count'];
		}	
	 #------------------------------------------------------------get Site request count--------------------------------------------------------
	function getSiteCount()
		{
			global $CFG;
			global $objSmarty;
			$sql_qry = "SELECT count(theme_id) as site_count FROM ".$CFG['table']['domaindetails']." WHERE theme_id != '0'";
		  	$res_qry = $this->ExecuteQuery($sql_qry,'select');
		  	return $res_qry[0]['site_count'];
		}
   #-----------------------------------------------get store Count---------------------------------------------------------------------------------      
    function getStoreCount()
		{
			global $CFG;
			global $objSmarty;
			$sql_qry = "SELECT count(store_id) as store_count FROM ".$CFG['table']['domaindetails']." WHERE store_id 	 != '0'";
		  	$res_qry = $this->ExecuteQuery($sql_qry,'select');
		  	return $res_qry[0]['store_count'];
		}    
	#-----------------------------------------------get user name---------------------------------------------------------------------------------    
	#send Mail for convey publish
	function sendMailForDomainPublishUnPublish()
		{
			global $CFG;
    	    $sel_id 	     = $_POST['checkedvaluesarr'];
			$tablename 		 = $_POST['tablename'];
			$filedname 		 = $_POST['fieldname'];
			$changestatusval = $_POST['changestatusval'];
			$upid 			 = $_POST['whereField'];
			$from_name       = $CFG['site']['adminname'];
			$from_email      = $CFG['site']['adminemail'];
			
			if( isset($sel_id) && is_array($sel_id) ) {
		        foreach($sel_id as $x => $value){
		        	$sel_del = "UPDATE ".$tablename." SET ".$filedname." = '".$this->filterInput($changestatusval)."' WHERE ".$upid." = '".$this->filterInput($value)."'";
	            	$res_del = mysql_query($sel_del) or die($this->mysql_error($sel_del));
	            	if($res_del)
	            		{
							
				         	$mail_content = $this->readfilecontent($CFG['site']['emailtpl_path']."/emailToAllDomainUser.tpl");
					        $mail_content = str_replace('{SITE_TITLE}',$CFG['site']['sitename'],$mail_content);
					        $mail_content = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_content);
					        
					        if($changestatusval == 'publish')
					        	{
					        		$to_email= $this->selectEmailFromSighupTable($value);
					        		$mailsubject  = $CFG['site']['sitename']." Your New Domain Published";
									$name= $this->selectNameFromSighupTable($value);
				            		$domain_name= $this->selectDomainFromSighupTable($value);
				            		$mail_content = str_replace('{CONTENT}','Your '.$domain_name.' Domain Published By Us.Lets Enjoy With Your New Domain.',$mail_content);
				            		$mail_content = str_replace('{NAME}',$name,$mail_content);
								}
					        
					        else if($changestatusval == 'unpublish')
						        {
						        	 $to_email= $this->selectEmailFromSighupTable($value);
						        	 $mailsubject  = $CFG['site']['sitename']." Your New Domain Un Published";
									 $name= $this->selectNameFromSighupTable($value);
				           			 $domain_name= $this->selectDomainFromSighupTable($value);
				           			 $mail_content = str_replace('{CONTENT}','Your '.$domain_name.' Domain Un Published By Us.Sorry For Delaying.Soon We Will Contact You.',$mail_content);
				           			 $mail_content = str_replace('{NAME}',$name,$mail_content);
								}
					        
					        else if($changestatusval == 'pointed')
					        	{
					        		 $to_email= $this->selectPointEmailFromSighupTable($value);
					        		 $mailsubject  = $CFG['site']['sitename']." Your Domain Pointed";
					        		 $name= $this->selectPointNameFromSighupTable($value);
				           			 $domain_name= $this->selectPointDomainFromSighupTable($value);
									 $mail_content = str_replace('{CONTENT}','Your '.$domain_name.' Domain Pointed .Lets Enjoy With Your New Point Domain.',$mail_content);
									 $mail_content = str_replace('{NAME}',$name,$mail_content);
								}
				 	        else
					        	{
					        		 $to_email= $this->selectPointEmailFromSighupTable($value);
					        		 $mailsubject  = $CFG['site']['sitename']." Your Domain Un Pointed";
					        		 $name= $this->selectPointNameFromSighupTable($value);
				           			 $domain_name= $this->selectPointDomainFromSighupTable($value);
									 $mail_content = str_replace('{CONTENT}','Your '.$domain_name.' Domain Un Pointed By Us.Sorry For Delaying.Soon We Will Contact You.',$mail_content);
									 $mail_content = str_replace('{NAME}',$name,$mail_content);
								}
					        
					        $mail_content = str_replace('{ADMINNAME}',$CFG['site']['adminname'],$mail_content);
							//echo $mail_content;die();
							$ok=$this->sendMail($from_name,$from_email,$to_email,$mailsubject,$mail_content);
						}
		            
		    	}
		        echo 'success';exit;
		    }		
			
		}
		
	  
  
  
}
?>