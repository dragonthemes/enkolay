<?php

/**
 * @author kathirvel 
 * @copyright 2013
 */

include("includes/config.inc.php");
$objSite->languageSession();
$objCommon->userAuthendication();
#.............................................................................................
	$objCommon->user_unauthetic();
			
	
#.............................................................................................
$main_content = $objSmarty->fetch('support.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('main.tpl');

?>