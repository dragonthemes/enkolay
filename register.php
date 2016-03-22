<?php 
include("includes/config.inc.php");
#Language
$objSite->languageSession();

//end of kathir code;
$main_content = $objSmarty->fetch('register.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('main.tpl');
?>