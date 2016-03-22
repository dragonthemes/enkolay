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
$objAdmin		= new Admin;
$objAdmin->Admin_authetic();
$objAdminMgmt	= new AdminManagement;
#.............................................................................................
	#Export Process	
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'exportProcess'){
		$objAdminMgmt->exportCuisineList();
	}	
	#-----------------------------------------------------------------------------------------
	#Import Process	
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'importProcess'){
		
		$objAdminMgmt->importCuisineList();
	}
	#----------------------------------------------------------------------------------------
	#for success message
	if(isset($_GET['msg'])== 'updatecontact')
		{
			$objSmarty->assign('ErrorMessage','Contact email address updated successfully');
		}
 
	#-----------------------------------------------------------------------------------------
	#List
	$objAdminMgmt->contactList();
	$objSmarty->assign("objAdminMgmt", $objAdminMgmt);
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $objSmarty->fetch('contactManage.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('admin_main.tpl');
?>