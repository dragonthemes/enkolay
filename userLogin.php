<?php 
include("includes/config.inc.php");
//include("includes/temp/facebookShare.php");
$objSite->languageSession();
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $objSmarty->fetch('userLogin.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('main.tpl');
?>