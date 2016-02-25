<?php

/**
 * @author kathirvel
 * @copyright 2014
 */

include ("../includes/config.inc.php");
#Language
$objSite->languageSession();
//end	
#Classes
$objAdmin		= new Admin;
$objAdmin->Admin_authetic();

$objAdminMgmt	= new AdminManagement;

$objSmarty->assign("themetable", $CFG['table']['thememanage']);	
$objSmarty->assign("blogtable", $CFG['table']['blogmanage']);	
$objSmarty->assign("posttable", $CFG['table']['posttitle']);
$objSmarty->assign("storetable", $CFG['table']['storemanage']);
//$objAdminMgmt->getDomainDetailsOfParticularUser($user_id);	
#-----------------------------------------------------------------------------------------
#List
if(!empty($_GET['user_id']) && isset($_GET['user_id']))
	{
		$objAdminMgmt->getDomainDetailsOfParticularUser();		
	}
else
	{
	
	}	
$objSmarty->assign("objAdminMgmt", $objAdminMgmt);
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $objSmarty->fetch('manageDomainDetails.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('admin_main.tpl');

?>