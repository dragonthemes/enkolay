<?php

/**
 * @author KATHIRVEL
 * @copyright 2014
 */
include ("../includes/config.inc.php");
#Language
$objSite->languageSession();
//end	
#.............................................................................................

#Classes
$objAdmin	= new Admin();
$objAdmin->Admin_authetic();
$objAdminMgmt	= new AdminManagement();
#.............................................................................................
#Edit Area
if(isset($_GET['user_id']) && !empty($_GET['user_id'])){
	
	if(isset($_POST['action']) && ($_POST['action'] == "Edit") ){
		$objAdminMgmt->useDetailsEdit($_GET['user_id']);
	}
	$value = $objSite->getMultiValue("username,email",$CFG['table']['register'],"user_id='".$objAdminMgmt->filterInput($_GET['user_id'])."'");	
	$objSmarty->assign("uservalue",$value);
}
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $objSmarty->fetch('userManageAdd.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('admin_main.tpl');


?>