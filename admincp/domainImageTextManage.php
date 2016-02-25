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
	$new  = $objAdminMgmt->ImageTextlist();
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $objSmarty->fetch('domainImageTestMnage.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('admin_main.tpl');
?> 