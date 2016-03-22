<?php 
include ("../includes/config.inc.php");

#Language
$objSite->languageSession();
//end	
#.............................................................................................

#Classes
$objAdmin		= new Admin;
$objAdmin->Admin_authetic();

$objAdminMgmt	= new AdminManagement;
#.............................................................................................
	#Export Process	
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'exportProcess'){
		$objAdminMgmt->exportLanguage();
	}	
	#-----------------------------------------------------------------------------------------	
	#Import Process	
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'importProcess'){
		
		$objAdminMgmt->importLanguage();
	}
	#-----------------------------------------------------------------------------------------
	#List
	$objAdminMgmt->languageNameList();
	
	//$lang = $objAdminMgmt->chklanguageNameSelect();
	
	//$objSmarty->assign("lang_status", $lang);
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $objSmarty->fetch('languageManageAdmin.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('admin_main.tpl');
?>