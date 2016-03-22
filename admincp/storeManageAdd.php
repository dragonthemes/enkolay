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
	if(isset($_POST['action']) && !empty($_POST['action']) && empty($_GET['store_id']) && $_POST['action'] == "storemanageadd"){
		//echo __LINE__;die();		
		$objAdminMgmt = new AdminManagement;	
		$objAdminMgmt->InsertStoreFunction();		
	}
	#Edit cuisine names
	if(isset($_GET['store_id']) && !empty($_GET['store_id']) && isset($_POST['action']) && ($_POST['action'] == "storemanageedit") ){		
		
		$objAdminMgmt = new AdminManagement;	
		$objAdminMgmt->updateStoreFunction();		
	}
	
	
	$selectFollowersValue = $objSite->getMultiValue("store_id, store_name, store_description, store_image, red_store_image, green_store_image,orange_store_image ,violet_store_image, status",$CFG['table']['storemanage'],"store_id ='".$objAdminMgmt->filterInput($_GET['store_id'])."' ");
	
	$objSmarty->assign('selectFollowersValue',$selectFollowersValue);
	
#.............................................................................................
#SMARTY ASSIGNING 
//$objSmarty->display('cuisineAddEdit.tpl');
$main_content = $objSmarty->fetch('storeManageAdd.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('admin_main.tpl');
?>