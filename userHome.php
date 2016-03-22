<?php

/**
 * @author kathirvel 
 * @copyright 2013
 */

include("includes/config.inc.php");
$objSite->languageSession();
$objCommon->userAuthendication();
unset($_SESSION['page_id']);

#.............................................................................................
		
if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'settingload')
	{
		global $CFG; 
		unset($_SESSION['blogonuse']);
		unset($_SESSION['storeonuse']);
		unset($_SESSION['store_id']);
		$_SESSION['themeOnuse'] = 1; 
		$_SESSION['domain_id'] = $_POST['domain_id'];
		$_SESSION['theme_id'] = $_POST['theme_id'];
		$themename = $objCommon->getValue('theme_name',$CFG['table']['themeselection'],"domain_id='".$objCommon->filterInput($_SESSION['domain_id'])."'");
		$_SESSION['themename'] = strtolower($themename);
		echo "sucess";
		exit();
	}
else if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'settingblog')
	{
		unset($_SESSION['themeOnuse']);
		unset($_SESSION['storeonuse']);
		unset($_SESSION['store_id']);
		$_SESSION['blogonuse'] = 1; 
		$_SESSION['domain_id'] = $_POST['domain_id'];
		$_SESSION['blog_id'] = $_POST['blog_id'];
		echo "sucess";
		exit();
	}
else if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'settingstore')
	{
		unset($_SESSION['themeOnuse']);
		unset($_SESSION['blogonuse']);
		$_SESSION['storeonuse'] = 1; 
		$_SESSION['domain_id'] = $_POST['domain_id'];
		$_SESSION['store_id'] = $_POST['store_id'];
		echo "sucess";
		exit();
	}	
else if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'DeleteDomain')
	{
		$objCommon->DeleteSubDomain();
		$objCommon->DeleteSubDomainTheme();
		$objCommon->CommonDeleteFunction($table=$CFG['table']['pages']);
		$objCommon->CommonDeleteFunction($table=$CFG['table']['page_list']);
		$objCommon->CommonDeleteFunction($table=$CFG['table']['contact_form']);
		$objCommon->CommonDeleteFunction($table=$CFG['table']['contact']);
		$objCommon->CommonDeleteFunction($table=$CFG['table']['social_plugins']);
		$objCommon->CommonDeleteFunction($table=$CFG['table']['domain_images']);
		echo "sucess";
		exit();	
	}
else if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'DeleteDomainWithBlog')
	{
		$objCommon->DeleteSubDomain();
		$objCommon->DeleteSubDomainBlog();
		$objCommon->CommonDeleteFunction($table=$CFG['table']['pages']);
		$objCommon->CommonDeleteFunction($table=$CFG['table']['page_list']);
		$objCommon->CommonDeleteFunction($table=$CFG['table']['contact_form']);
		$objCommon->CommonDeleteFunction($table=$CFG['table']['contact']);
		$objCommon->CommonDeleteFunction($table=$CFG['table']['social_plugins']);
		$objCommon->CommonDeleteFunction($table=$CFG['table']['domain_images']);
		echo "sucess";
		exit();	
	}
else if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'DeleteDomainWithStore')
	{
		$objCommon->DeleteSubDomain();
		$objCommon->DeleteSubDomainStore();
		$objCommon->CommonDeleteFunction($table=$CFG['table']['pages']);
		$objCommon->CommonDeleteFunction($table=$CFG['table']['page_list']);
		$objCommon->CommonDeleteFunction($table=$CFG['table']['contact_form']);
		$objCommon->CommonDeleteFunction($table=$CFG['table']['contact']);
		$objCommon->CommonDeleteFunction($table=$CFG['table']['social_plugins']);
		$objCommon->CommonDeleteFunction($table=$CFG['table']['domain_images']);
		echo "sucess";
		exit();	
	}
else if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'showcommenttheme')
	{
		$objCommon->getParicularDomainDetails($_POST['domain_id']);
		echo "show|@|";
		$objSmarty->display('blockthemecomment.tpl');
		exit();
	}
else if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'showcommentblog')
	{
		$objCommon->getParicularDomainDetails($_POST['domain_id']);
		$objCommon->ListtheCommentDetails($_POST['domain_id']);
		echo "show|@|";
		$objSmarty->display('blockcomment.tpl');
		exit();		
	}
else if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'showblockformtheme')
	{
		$objCommon->getParicularDomainDetails($_POST['domain_id']);
		$objCommon->listFormDetailsDetails($_POST['domain_id']);
		$objCommon->checkContactForm($_POST['domain_id']);
		echo "show|@|";
		$objSmarty->display('formthemeentries.tpl');
		exit();
	}
else if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'showblockformblog')
	{
		$objCommon->getParicularDomainDetails($_POST['domain_id']);
		echo "show|@|";
		$objSmarty->display('formblogentries.tpl');
		exit();
	}
else if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'blogcommentdelete')
	{
		$ids = $_POST['checkedvalues'];
		if(is_array($ids))
			{
				foreach($ids as $x => $value)
					{
						$objCommon->deleteBlogComment($_POST['domain_id'],$value);
					}
			}
		$objCommon->getParicularDomainDetails($_POST['domain_id']);	
		$objCommon->ListtheCommentDetails($_POST['domain_id']);
		echo "delete|@|";
		$objSmarty->display('blockcomment.tpl');
		exit();
	}	
    
    $objCommon->user_unauthetic();
	$objCommon->getDomainDetails();
	//$objCommon->getSubsCripDetails();
	$subdomain= $objCommon->getSubdomainName($_SESSION['domain_id']);
	$objSmarty->assign("SUBDOMAIN", $subdomain);							
					
#.............................................................................................
$main_content = $objSmarty->fetch('userHome.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('main.tpl');

?>