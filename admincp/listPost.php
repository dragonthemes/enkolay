<?php

/**
 * @author krishnaveni
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
	
#-----------------------------------------------------------------------------------------
#List
if(($_GET['domain_id']) != '')
$objAdminMgmt->listPost($_GET['domain_id']);
	
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $objSmarty->fetch('listPost.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('admin_main.tpl');

?>