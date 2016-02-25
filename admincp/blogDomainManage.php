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
$objAdminMgmt->listBlogsDomain();
	
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $objSmarty->fetch('blogDomainManage.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('admin_main.tpl');

?>