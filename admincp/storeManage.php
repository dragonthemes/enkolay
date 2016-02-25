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
	#-----------------------------------------------------------------------------------------
	#List	
	$new  = $objAdminMgmt->storeList();
if($_GET['action'] == 'addstore')
	{
		$objSmarty->assign('ERRORMESSAGE','Store added successfully');
	}
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $objSmarty->fetch('storeManage.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('admin_main.tpl');
?> 