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

#Classes
$objAdmin		= new Admin;
$objAdmin->Admin_authetic();

$objAdminMgmt	= new AdminManagement;
	
	#-----------------------------------------------------------------------------------------
	#List
	$objAdminMgmt->getActivitiesList();

#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $objSmarty->fetch('recentActivity.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('admin_main.tpl');


?>