<?php 
include ("../includes/config.inc.php");

#Language
$objSite->languageSession();
//end	
#.............................................................................................

#Classes
$objAdmin	= new Admin();
$objAdmin->Admin_Notauthetic();
#..........................................................................
#..........................................................................	
$objSmarty->display("login.tpl");
?>