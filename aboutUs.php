<?php
include("includes/config.inc.php");
$objSite->languageSession();
 
#.............................................................................................

#---------------------------------------------------------------------------------------------
#SMARTY ASSIGNING 
$main_content = $objSmarty->fetch('aboutUs.tpl');
$objSmarty->assign("MAIN_CONTENT",$main_content);
$objSmarty->display('main.tpl');
?>