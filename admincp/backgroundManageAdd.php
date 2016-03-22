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

#Classes
$objAdmin	= new Admin;
$objThumb   = new Thumbnail;
$objAdmin->Admin_authetic();
#.............................................................................................	
	#Add new cuisine 
	if(isset($_POST['action']) && !empty($_POST['action']) && empty($_GET['background_id']) && $_POST['action'] == "backgroundAddEdit"){		
		$objAdminMgmt = new AdminManagement;	
		$objAdminMgmt->newBackgroundAdd();		
	}
	#Edit cuisine name
	if(isset($_GET['background_id']) && !empty($_GET['background_id']) && isset($_POST['action']) && ($_POST['action'] == "backgroundAddEdit") ){		
		
		$objAdminMgmt = new AdminManagement;	
		$objAdminMgmt->editBackground();		
	}else{
			$selectFollowersValue = $objSite->getMultiValue("background_id, background_name, background_image, status, addeddate",$objAdminMgmt->filterInput($CFG['table']['background']),"background_id ='".$objAdminMgmt->filterInput($_GET['background_id'])."' ");	
			
			$objSetting	= new Setting;
			global $objSetting;	
			
			//$iconset	=  $objSite->getMultiValue("banner_thumb_width,banner_thumb_height",$CFG['table']['iconsetting'],"background_id='".$CFG['site']['domain_id']."'");
			#print_r($iconset);
			
			$background_width	=	$iconset['0']['background_thumb_width'];
			$background_height	=	$iconset['0']['background_thumb_height'];	
			
			#echo $banner_width;
			#echo $banner_height;
			
		 
			
			$objSmarty->assign('selectFollowersValue',$selectFollowersValue);	
			$objSmarty->assign("background_width", $background_width);
			$objSmarty->assign("background_height", $background_height);			
	}
#.............................................................................................
#SMARTY ASSIGNING 
//$objSmarty->display('cuisineAddEdit.tpl');
$main_content = $objSmarty->fetch('backgroundManageAdd.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('admin_main.tpl');
?>