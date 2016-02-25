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
		$objAdminMgmt->exportCuisineList();
	}	
	#-----------------------------------------------------------------------------------------
	#Import Process	
	if(isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'importProcess'){
		
		$objAdminMgmt->importCuisineList();
	}
	#-----------------------------------------------------------------------------------------
	#List
	
	$objSmarty->assign("objAdminMgmt", $objAdminMgmt);
	$objAdminMgmt->fansList();
	
	
	#for success message
	if($_GET['msg'] == 'updatefans')
		{
			$objSmarty->assign('ErrorMessage','Fans Pages updated successfully');	
		}
	else if($_GET['msg'] == 'addfans')
		{ 
			$objSmarty->assign('ErrorMessage','Fans Pages added successfully');	
		}
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $objSmarty->fetch('fansManage.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('admin_main.tpl');
?> 