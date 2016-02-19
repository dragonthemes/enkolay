<?php
include("includes/config.inc.php");
$objSite->languageSession();
 
#.............................................................................................

#---------------------------------------------------------------------------------------------
#SMARTY ASSIGNING 
$main_content = $objSmarty->fetch('contactUs.tpl');
$objSmarty->assign("MAIN_CONTENT",$main_content);
$objSmarty->display('main.tpl');
?>