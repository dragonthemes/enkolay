<?php

/**
 * @author krishnaveni
 * @copyright 2014
 */

include("includes/config.inc.php");
$objSite->languageSession();
#.............................................................................................
	 	
	
#.............................................................................................
$main_content = $objSmarty->fetch('resetNewConfirm.tpl');
$objSmarty->assign("MAIN_CONTENT", $main_content);
$objSmarty->display('main.tpl');

?>