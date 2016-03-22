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

include ("fckeditor_files.php");
#Classes
$objAdmin	= new Admin;
$objThumb   = new Thumbnail;
$objAdmin->Admin_authetic();
#.............................................................................................	
	#Add new cuisine 
	if(isset($_POST['action']) && !empty($_POST['action']) && empty($_GET['banner_id']) && $_POST['action'] == "bannerAddEdit"){		
		$objAdminMgmt = new AdminManagement;	
		$objAdminMgmt->newBannerAdd();		
	}
	#Edit cuisine name
	if(isset($_GET['banner_id']) && !empty($_GET['banner_id']) && isset($_POST['action']) && ($_POST['action'] == "bannerAddEdit") ){		
		
		$objAdminMgmt = new AdminManagement;	
		$objAdminMgmt->editBanner();		
	}else{
			$selectFollowersValue = $objSite->getMultiValue("banner_id, banner_name, banner_title, banner_image, status, addeddate",$CFG['table']['banner'],"banner_id ='".$objAdminMgmt->filterInput($_GET['banner_id'])."' ");	
			
			$objSetting	= new Setting;
			global $objSetting;	
			
			//$iconset	=  $objSite->getMultiValue("banner_thumb_width,banner_thumb_height",$CFG['table']['iconsetting'],"banner_id='".$CFG['site']['domain_id']."'");
			#print_r($iconset);
			
			$banner_width	=	$iconset['0']['banner_thumb_width'];
			$banner_height	=	$iconset['0']['banner_thumb_height'];	
			
			#echo $banner_width;
			#echo $banner_height;
			
			#content
			$oFCKeditor->Value	= stripslashes($selectFollowersValue['0']['banner_title']);
			$Editor 			= $oFCKeditor->Create();
			
			$objSmarty->assign('selectFollowersValue',$selectFollowersValue);
			$objSmarty->assign("Editor", $Editor);	
			$objSmarty->assign("banner_width", $banner_width);
			$objSmarty->assign("banner_height", $banner_height);			
	}
#.............................................................................................
#SMARTY ASSIGNING 
//$objSmarty->display('cuisineAddEdit.tpl');
$main_content = $objSmarty->fetch('bannerManageAdd.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('admin_main.tpl');
?>