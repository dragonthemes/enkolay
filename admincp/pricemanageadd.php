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
	/*if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == "pricemanageadd"){		
		$objAdminMgmt = new AdminManagement;	
		$objAdminMgmt->InsertPriceFunction();		
	}*/
	#Edit cuisine names
	if(isset($_GET['price_id']) && !empty($_GET['price_id']) && isset($_POST['action']) && ($_POST['action'] == "pricemanageedit") ){		
		
		$objAdminMgmt = new AdminManagement;	
		$objAdminMgmt->updatePriceFunction();		
	}
	
	#List In edit table
	$selectFollowersValue = $objSite->getMultiValue("price_id, price_name, price_description, price, status",$CFG['table']['pricemanage'],"price_id ='".$objAdminMgmt->filterInput($_GET['price_id'])."' ");			
	$objSmarty->assign('selectFollowersValue',$selectFollowersValue);
	
#.............................................................................................
#SMARTY ASSIGNING 
//$objSmarty->display('cuisineAddEdit.tpl');
$main_content = $objSmarty->fetch('pricemanageadd.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('admin_main.tpl');
?>