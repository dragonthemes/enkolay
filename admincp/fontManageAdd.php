<?php

/**
 * @author krishnaveni
 * @copyright 2014
 */
include ("../includes/config.inc.php");

#Language
$objSite->languageSession();
//end	
#.............................................................................................

include ("fckeditor_files.php");
#Classes
$objAdmin	= new Admin;
$objThumb   = new Thumbnail;
$objAdmin->Admin_authetic();
#.............................................................................................	
	#Add new cuisine 
	if(isset($_POST['action']) && !empty($_POST['action']) && empty($_GET['font_id']) && $_POST['action'] == "fontAddEdit"){
		//echo __LINE__;die();		
		$objAdminMgmt = new AdminManagement;	
		$objAdminMgmt->newFontAdd();		
	}
	#Edit cuisine name
	if(isset($_GET['font_id']) && !empty($_GET['font_id']) && isset($_POST['action']) && ($_POST['action'] == "fontAddEdit") ){		
		
		$objAdminMgmt = new AdminManagement;	
		$objAdminMgmt->editFont();		
	}else{
			$selectFollowersValue = $objSite->getMultiValue("font_id, font_name, status, addeddate",$CFG['table']['font'],"font_id ='".$objAdminMgmt->filterInput($_GET['font_id'])."' ");	
			
			$objSetting	= new Setting;
			global $objSetting;	
			 
		 	//print_r($selectFollowersValue);die();
			$objSmarty->assign('selectFollowersValue',$selectFollowersValue);
		 			
	}
#.............................................................................................
#SMARTY ASSIGNING 
//$objSmarty->display('cuisineAddEdit.tpl');
$main_content = $objSmarty->fetch('fontManageAdd.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('admin_main.tpl');
?>