<?php 
include ("../includes/config.inc.php");

#Language
$objSite->languageSession();
//end	
#.............................................................................................
$objAdmin	= new Admin();
$objCommon  = new Common();
$objAdminMgmt	= new AdminManagement;
$objAdmin->Admin_authetic();
$objSmarty->assign("objAdmin",$objAdmin);
$objSmarty->assign('objCommon',$objCommon);
#.............................................................................................
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $objSmarty->fetch('index.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('admin_main.tpl');
?>
