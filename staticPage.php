<?php

include("includes/config.inc.php");
$objSite->languageSession();
#.............................................................................................
	 
	$objCommon->staticContents($_GET['con_seourl']);
 
	#echo "<pre>";print_r($_REQUEST);echo "</pre>";
#.............................................................................................
#SMARTY ASSIGNING 
$main_content = $objSmarty->fetch('staticPage.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('main.tpl');
?>