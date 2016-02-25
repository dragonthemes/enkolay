<?php 
include ("../includes/config.inc.php");
#Language
$objSite->languageSession();
//end	
#.............................................................................................

#Classes
$objAdmin	= new Admin;
$objAdmin->Admin_authetic();
#.............................................................................................
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $objSmarty->fetch('admin_change_pwd.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('admin_main.tpl');
?>