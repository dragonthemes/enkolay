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
	if(isset($_POST['action']) && !empty($_POST['action']) && empty($_GET['id']) && $_POST['action'] == "currencyManageAdd"){		
		$objAdminMgmt = new AdminManagement;	
		$objAdminMgmt->InsertCurrencyFunction();		
	}
	#Edit cuisine names
	if(isset($_GET['id']) && !empty($_GET['id']) && isset($_POST['action']) && ($_POST['action'] == "currencyManageEdit") ){		
		
		$objAdminMgmt = new AdminManagement;	
		$objAdminMgmt->UpdateCurrencyFunction();		
	}
	
	
	$selectCurrencyValue = $objSite->getMultiValue("id,currency_name,currency_code,currency_type,currency_symbol,currency_status",$CFG['table']['currencymanage'],"id ='".$objAdminMgmt->filterInput($_GET['id'])."' ");
	$objSmarty->assign('selectCurrencyValue',$selectCurrencyValue);
	
#.............................................................................................
#SMARTY ASSIGNING 
//$objSmarty->display('cuisineAddEdit.tpl');
$main_content = $objSmarty->fetch('currencyManageAdd.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('admin_main.tpl');
?>