<?php
include("includes/config.inc.php");
$objSite->languageSession();
$objCommon->userAuthendication();
#.............................................................................................
#---------------------------------------------------------------------------------------------
#SMARTY ASSIGNING 
$main_content = $objSmarty->fetch('buildEdit.tpl');
$objSmarty->assign("MAIN_CONTENT",$main_content);
$objSmarty->display('main.tpl');
?>