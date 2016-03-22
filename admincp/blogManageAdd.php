<?php

/**
 * @author kathirvel
 * @copyright 2014
 */
include ("../includes/config.inc.php");

#Language
$objSite->languageSession();
//end	
#.............................................................................................
#Classes
$objAdmin->Admin_authetic();
#.............................................................................................	
	#Add new cuisine 
	if(isset($_POST['action']) && !empty($_POST['action']) && empty($_GET['blog_id']) && $_POST['action'] == "blogmanageadd"){		
		$objAdminMgmt = new AdminManagement;	
		$objAdminMgmt->InsertBlogFunction();		
	}
	#Edit cuisine names
	if(isset($_GET['blog_id']) && !empty($_GET['blog_id']) && isset($_POST['action']) && ($_POST['action'] == "blogmanageedit") ){		
		
		$objAdminMgmt = new AdminManagement;	
		$objAdminMgmt->updateBlogFunction($_GET['blog_id']);		
	}
	
	
	$selectFollowersValue = $objSite->getMultiValue("blog_id, blog_name, blog_description, blog_image, red_blog_image, green_blog_image, orange_blog_image, violet_blog_image, status",$CFG['table']['blogmanage'],"blog_id ='".$objAdminMgmt->filterInput($_GET['blog_id'])."' ");
	
	$objSmarty->assign('selectFollowersValue',$selectFollowersValue);
	
#.............................................................................................
#SMARTY ASSIGNING 
//$objSmarty->display('cuisineAddEdit.tpl');
$main_content = $objSmarty->fetch('blogManageAdd.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('admin_main.tpl');


?>