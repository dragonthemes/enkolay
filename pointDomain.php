<?php

/**
 * @author kathirvel 
 * @copyright 2013
 */

include("includes/config.inc.php");
$objSite->languageSession();
#.............................................................................................
	$objCommon->user_unauthetic();
			

$objSmarty->assign('objCommon',$objCommon);
#.............................................................................................
$main_content = $objSmarty->fetch('pointDomain.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('main.tpl');

?>