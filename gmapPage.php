<?php
include("includes/config.inc.php");
$objSite->languageSession();

#.............................................................................................
#---------------------------------------------------------------------------------------------
#SMARTY ASSIGNING 
$objSmarty->display('gmapPage.tpl');
?>