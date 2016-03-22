<?php
include("includes/config.inc.php");
$objSite->languageSession();
#.............................................................................................
if(isset($_GET['user_id']) && !empty($_GET['user_id'])){		
		$objCommon->successReg();
}
#---------------------------------------------------------------------------------------------
#SMARTY ASSIGNING 
$main_content = $objSmarty->fetch('thanks.tpl');
$objSmarty->assign("MAIN_CONTENT",$main_content);
$objSmarty->display('main.tpl');
?>