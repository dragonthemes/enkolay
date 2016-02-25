<?php 
include ("../includes/config.inc.php");

#Language
$objSite->languageSession();
//end	
#.............................................................................................
#Classes
$objAdmin->Admin_authetic();
#.............................................................................................	
	#Add new cuisine 
	if(isset($_POST['action']) && !empty($_POST['action']) && empty($_GET['theme_id']) && $_POST['action'] == "thememanageadd"){		
		$objAdminMgmt = new AdminManagement;	
		$objAdminMgmt->InsertThemeFunction();		
	}
	#Edit cuisine names
	if(isset($_GET['theme_id']) && !empty($_GET['theme_id']) && isset($_POST['action']) && ($_POST['action'] == "thememanageedit") ){		
		
		$objAdminMgmt = new AdminManagement;	
		$objAdminMgmt->updateThemeFunction();		
	}
	
	
	$selectFollowersValue = $objSite->getMultiValue("theme_id, theme_name, theme_description, theme_image, red_theme_image, green_theme_image,orange_theme_image ,violet_theme_image, status",$CFG['table']['thememanage'],"theme_id ='".$objAdminMgmt->filterInput($_GET['theme_id'])."' ");
	
	$objSmarty->assign('selectFollowersValue',$selectFollowersValue);
	
#.............................................................................................
#SMARTY ASSIGNING 
//$objSmarty->display('cuisineAddEdit.tpl');
$main_content = $objSmarty->fetch('thememanageadd.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('admin_main.tpl');
?>