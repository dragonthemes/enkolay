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
	
	#-----------------------------------------------------------------------------------------
	#List
	$objAdminMgmt->listNewDomain($_GET['domain_id']);

$objCommon		= new Common;
$objSmarty->assign("objCommon", $objCommon);	
$objSmarty->assign("objAdminMgmt", $objAdminMgmt);
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $objSmarty->fetch('listNewDomain.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('admin_main.tpl');
?>